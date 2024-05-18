use std::{error::Error, fs::File, io::{self, Write}, path::Path};
use serde::{Deserialize, Serialize};
use serde_json;

use indoc::indoc;

#[derive(PartialEq, Default, Deserialize, Serialize)]
enum QType {
    #[default]
    GET,
    POST,
    UPDATE,
    DELETE,
}

impl ToString for QType {
    fn to_string(&self) -> String {
        use QType::*;
        match self {
            &GET    => "get",
            &POST   => "post",
            &UPDATE => "update",
            &DELETE => "delete",
        }
        .to_string()
    }
}

#[derive(Default, Deserialize, Serialize)]
struct Entry {
    qtype: QType,
    name: String,
    path: Vec<String>,
    variables: Vec<String>,
    handler: String,
}


fn main() -> Result<(), Box<dyn Error>> {
    let mut entries: Vec<Entry> = vec![];

    loop {
        let mut entry = Entry::default();

        print(indoc! {"
        ======================================
        Добавляем новый метод API. Выбери тип: 
            1 - GET
            2 - POST
            3 - UPDATE
            4 - DELETE
            5 - Загрузить из файла
            6 - Завершить ввод
        [1] > "})?;

        let mut buf = String::new();
        std::io::stdin().read_line(&mut buf)?;

        use QType::*;
        match buf.as_bytes()[0] {
            b'1' | b'\n' 
                 => {
                println!("Выбран метод GET.");
                entry.qtype = GET;
            },
            b'2' => {
                println!("Выбран метод POST.");
                entry.qtype = POST;
                },
            b'3' => {
                println!("Выбран метод UPDATE.");
                entry.qtype = UPDATE;
            },
            b'4' => {
                println!("Выбран метод DELETE.");
                entry.qtype = DELETE;
            },
            b'5' => {
                println!("Пробую загрузить из файла...");
                entries.append(&mut deserial("saved.json".to_string()));
                continue;
            }
            b'6' => {
                break;
            }
            _ => { println!("\nНеверный ввод."); continue; },
        };
        buf.clear();

        print("Введи имя метода: ")?;
        std::io::stdin().read_line(&mut entry.name)?;
        entry.name = entry.name.trim().to_string();

        if entry.name.is_empty() {
            println!("Неверное имя.");
            continue;
        }

        print("Введи путь к методу (пример: `auth/auth`): ")?;

        std::io::stdin().read_line(&mut buf)?;

        entry.path = buf.split('/').map(|x| x.to_owned()).collect();

        if entry.path.is_empty() {
            println!("Неверный путь.");
            continue;
        }

        // print("Введи параметры метода (через запятую): ")?;
        // std::io::stdin().read_line(&mut buf)?;
        //
        // entry.variables = buf.chars()
        //                      .filter(|c| !c.is_whitespace())
        //                      .collect::<String>()
        //                      .split(',')
        //                      .map(|x| x.to_owned())
        //                      .collect();

        print(&format!("Введи название функции-обработчика [{}_handle]: ", entry.name))?;
        std::io::stdin().read_line(&mut entry.handler)?;
        entry.handler = entry.handler.trim().to_string();

        if entry.handler.is_empty() {
            entry.handler = format!("{}_handle", entry.name);
        }
        
        entries.push(entry);
    }

    if entries.is_empty() {
        Ok(())
    } else {
        println!("Модуль с запросами будет сохранен в файл requests.rs. ");

        let mut file = File::create("./requests.rs")?;
        let mut handler_names: Vec<String> = Vec::new();
        for e in &entries {
            handler_names.push(generate_code(&mut file, e)?);
        }
        for h in handler_names {
            generate_handlers(&mut file, h)?;
        }

        print("Сохранить введённые данные для продолжения ввода в будущем? [Y/n] ")?;
        let mut buf = String::new();
        std::io::stdin().read_line(&mut buf)?;

        match buf.to_lowercase().as_bytes()[0] {
            b'y' => {
                serial("saved.json", entries)?;
            }
            _ => (),
        }

        Ok(())
    }
}

fn print(text: &str) -> std::io::Result<()> {
    print!("{}", text);
    std::io::stdout().flush()?;

    Ok(())
}

fn generate_code(file: &mut File, entry: &Entry) -> io::Result<String> {
    let mut code = format!(r#"
pub fn build_{name}() -> impl Filter<Error = Rejection> {{
    warp::{qtype}()"#,
            name = entry.name.trim(),
            qtype = entry.qtype.to_string(),
    );

    for p in &entry.path {
        let p = p.trim();
        code.push_str(&format!(r#"
    .and(warp::path("{p}"))"#));
    }

    code.push_str(".and(warp::path::end())");

    if entry.qtype == QType::GET {
        code.push_str(&format!(r#".and(warp::query::<HashMap<String, String>>())
    .map(|p: HashMap<String, String>| {handler}(p))
}}
        "#, handler = entry.handler));
    } else if entry.qtype == QType::POST {
        // TODO подумать над ограничением потока
        code.push_str(&format!(r#".and(warp::body::bytes()).map(|bytes: bytes::Bytes| {handler}(p))
        "#, handler = entry.handler));
    } else {
        unimplemented!()
    }

    file.write_all(code.as_bytes())?;

    Ok(entry.handler.clone())
}

// TODO добавить вариант для POST
fn generate_handlers(file: &mut File, name: String) -> io::Result<()> {
    let code = format!(r#"
pub fn {name}(p: HashMap<String, String>) -> Response {{
    
}}"#);

    file.write_all(code.as_bytes())?;
    
    Ok(())
}

fn serial(path: &str, vector: Vec<Entry>) -> Result<(), Box<dyn Error>> {
    let path = Path::new(&path);

    let file = File::create(path)?;

    serde_json::to_writer(file, &vector)?;

    Ok(())
}

fn deserial(path: String) -> Vec<Entry> {
    let path = Path::new(&path);
    if !path.is_file() {
        eprintln!("Указанного файла не существует!");
        return vec![];
    }

    let file = match File::open(path) {
        Ok(f) => f,
        Err(e) => {eprintln!("{e}"); return vec![]; },
    };

    let vector = match serde_json::from_reader(file) {
        Ok(v) => v,
        Err(e) => { eprintln!("Ошибка десериализации файла: {e}"); return vec![]; }
    };

    vector
}
