mod api;
mod state;

use api::requests::*;

use std::{collections::HashMap, fs::File, io::Read};

use serde::Deserialize;
use warp::Filter;
use toml;

#[derive(Deserialize)]
struct Config {
    ipaddr: [u8; 4],
    port: u16,
}


#[tokio::main]
async fn main() {
    let mut confile: File = File::open("./config.toml").unwrap();
    let mut contents = String::new();
    confile.read_to_string(&mut contents);
    let config: Config = toml::from_str(&contents).unwrap();

    // Я бы очень хотел пообщаться с создателями библиотеки, которые считают,
    // что такой код - это хорошая идея 

    let build_auth = warp::get()
    .and(warp::path("api"))
    .and(warp::path("auth"))
    .and(warp::path("auth")).and(warp::path::end()).and(warp::query::<HashMap<String, String>>())
    .map(|p: HashMap<String, String>| auth_handle(p));

    let build_users_get = warp::get()
    .and(warp::path("api"))
    .and(warp::path("users"))
    .and(warp::path("get")).and(warp::path::end()).and(warp::query::<HashMap<String, String>>())
    .map(|p: HashMap<String, String>| users_get_handle(p));

    let build_users_add = warp::get()
    .and(warp::path("api"))
    .and(warp::path("users"))
    .and(warp::path("add")).and(warp::path::end()).and(warp::query::<HashMap<String, String>>())
    .map(|p: HashMap<String, String>| users_add_handle(p));

    let build_users_change = warp::get()
    .and(warp::path("api"))
    .and(warp::path("users"))
    .and(warp::path("change")).and(warp::path::end()).and(warp::query::<HashMap<String, String>>())
    .map(|p: HashMap<String, String>| users_change_handle(p));

    let build_users_remove = warp::get()
    .and(warp::path("api"))
    .and(warp::path("users"))
    .and(warp::path("remove")).and(warp::path::end()).and(warp::query::<HashMap<String, String>>())
    .map(|p: HashMap<String, String>| users_remove_handle(p));

    let build_files_getmeta = warp::get()
    .and(warp::path("api"))
    .and(warp::path("files"))
    .and(warp::path("getmeta")).and(warp::path::end()).and(warp::query::<HashMap<String, String>>())
    .map(|p: HashMap<String, String>| files_getmeta_handle(p));

    let build_files_add = warp::post()
    .and(warp::path("api"))
    .and(warp::path("files"))
    .and(warp::path("add")).and(warp::path::end()).and(warp::body::bytes()).map(|p: bytes::Bytes| files_add_handle(p));

    let build_files_remove = warp::get()
    .and(warp::path("api"))
    .and(warp::path("files"))
    .and(warp::path("remove")).and(warp::path::end()).and(warp::query::<HashMap<String, String>>())
    .map(|p: HashMap<String, String>| files_remove_handle(p));

    let build_files_get = warp::get()
    .and(warp::path("api"))
    .and(warp::path("files"))
    .and(warp::path("get")).and(warp::path::end()).and(warp::query::<HashMap<String, String>>())
    .map(|p: HashMap<String, String>| files_get_handle(p));

    let build_files_search = warp::get()
    .and(warp::path("api"))
    .and(warp::path("files"))
    .and(warp::path("search")).and(warp::path::end()).and(warp::query::<HashMap<String, String>>())
    .map(|p: HashMap<String, String>| files_search_handle(p));

    let build_posts_get = warp::get()
    .and(warp::path("api"))
    .and(warp::path("posts"))
    .and(warp::path("get")).and(warp::path::end()).and(warp::query::<HashMap<String, String>>())
    .map(|p: HashMap<String, String>| posts_get_handle(p));

    let build_posts_post = warp::get()
    .and(warp::path("api"))
    .and(warp::path("posts"))
    .and(warp::path("post")).and(warp::path::end()).and(warp::query::<HashMap<String, String>>())
    .map(|p: HashMap<String, String>| posts_post_handle(p));

    let build_posts_remove = warp::get()
    .and(warp::path("api"))
    .and(warp::path("posts"))
    .and(warp::path("remove")).and(warp::path::end()).and(warp::query::<HashMap<String, String>>())
    .map(|p: HashMap<String, String>| posts_remove_handle(p));

    let build_posts_change = warp::get()
    .and(warp::path("api"))
    .and(warp::path("posts"))
    .and(warp::path("change")).and(warp::path::end()).and(warp::query::<HashMap<String, String>>())
    .map(|p: HashMap<String, String>| posts_change_handle(p));

    let routes = build_auth.or(build_users_get)
                           .or(build_users_add)
                           .or(build_users_remove)
                           .or(build_users_change)

                           .or(build_files_getmeta)
                           .or(build_files_add)
                           .or(build_files_remove)
                           .or(build_files_get)
                           .or(build_files_search)

                           .or(build_posts_get)
                           .or(build_posts_post)
                           .or(build_posts_remove)
                           .or(build_posts_change);

    warp::serve(routes)
        .run((config.ipaddr, config.port))
        .await;
}
