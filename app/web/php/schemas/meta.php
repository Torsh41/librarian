<?php
//Для создания header для произведений
$meta_name_book = array();

// тут нужно добавить соединение с базой данных и получении данных о книг, к примеру вот:

// require($_SERVER['DOCUMENT_ROOT'] . '/function/conectBD.php');
// $name_book = mysqli_query($connectBD,"SELECT id_works, name_works FROM data_of_works");
// foreach ($name_book as $nameBoo) {
//     $meta_name_book[$nameBoo['id_works']] = $nameBoo['name_works']; 
// }

//Для создания header для страниц
$meta = [
    'index'=>[
        'title'=>'Сайт Библиотека',
        'description'=>'Тут можно удобно прочитать книги, учебники, конспекты и т.д.',
        'scripts'=>[],
        'style'=>[], 
    ],
    'php/template/pages/unique/catalog'=>[
        'title'=>'Каталог',
        'description'=>'Найди то что тебе нужно',
        'scripts'=>[],
        'style'=>[],
    ],
    'php/template/pages/unique/add_work'=>[
        'title'=>'Добавление произведения',
        'description'=>'Добавте на сайт новую работу',
        'scripts'=>[],
        'style'=>[], 
    ],
    'php/template/pages/unique/sign_up'=>[
        'title'=>'Авторизация',
        'description'=>'войдите в свою учетную запись',
        'scripts'=>[],
        'style'=>[],
    ],
    'php/template/pages/unique/sign_in'=>[
        'title'=>'Регистрация',
        'description'=>'присоединяййтесь к нам',
        'scripts'=>[],
        'style'=>[],
    ],
    'php/template/pages/recurring/works_info'=>[
        'title'=> $meta_name_book,
        'description'=> $meta_name_book,
        'scripts'=>[],
        'style'=>[],
    ],
    'php/template/pages/recurring/cabinet'=>[
        'title'=> 'Личный кабинет',
        'description'=> 'Личный кабинет',
        'scripts'=>[],
        'style'=>[],
    ],
];