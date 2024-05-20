use warp::Filter;
use warp::reply::Response;
use std::collections::HashMap;
use warp::Rejection;

pub fn build_auth() -> impl Filter<Error = Rejection> {
    warp::get()
    .and(warp::path("api"))
    .and(warp::path("auth"))
    .and(warp::path("auth")).and(warp::path::end()).and(warp::query::<HashMap<String, String>>())
    .map(|p: HashMap<String, String>| auth_handle(p))
}
        
pub fn build_users_get() -> impl Filter<Error = Rejection> {
    warp::get()
    .and(warp::path("api"))
    .and(warp::path("users"))
    .and(warp::path("get")).and(warp::path::end()).and(warp::query::<HashMap<String, String>>())
    .map(|p: HashMap<String, String>| users_get_handle(p))
}
        
pub fn build_users_add() -> impl Filter<Error = Rejection> {
    warp::get()
    .and(warp::path("api"))
    .and(warp::path("users"))
    .and(warp::path("add")).and(warp::path::end()).and(warp::query::<HashMap<String, String>>())
    .map(|p: HashMap<String, String>| users_add_handle(p))
}
        
pub fn build_users_change() -> impl Filter<Error = Rejection> {
    warp::get()
    .and(warp::path("api"))
    .and(warp::path("users"))
    .and(warp::path("change")).and(warp::path::end()).and(warp::query::<HashMap<String, String>>())
    .map(|p: HashMap<String, String>| users_change_handle(p))
}
        
pub fn build_users_remove() -> impl Filter<Error = Rejection> {
    warp::get()
    .and(warp::path("api"))
    .and(warp::path("users"))
    .and(warp::path("remove")).and(warp::path::end()).and(warp::query::<HashMap<String, String>>())
    .map(|p: HashMap<String, String>| users_remove_handle(p))
}
        
pub fn build_files_getmeta() -> impl Filter<Error = Rejection> {
    warp::get()
    .and(warp::path("api"))
    .and(warp::path("files"))
    .and(warp::path("getmeta")).and(warp::path::end()).and(warp::query::<HashMap<String, String>>())
    .map(|p: HashMap<String, String>| files_getmeta_handle(p))
}
        
pub fn build_files_add() -> impl Filter<Error = Rejection> {
    warp::post()
    .and(warp::path("api"))
    .and(warp::path("files"))
    .and(warp::path("add")).and(warp::path::end()).and(warp::body::bytes()).map(|p: bytes::Bytes| files_add_handle(p))
}
        
pub fn build_files_remove() -> impl Filter<Error = Rejection> {
    warp::get()
    .and(warp::path("api"))
    .and(warp::path("files"))
    .and(warp::path("remove")).and(warp::path::end()).and(warp::query::<HashMap<String, String>>())
    .map(|p: HashMap<String, String>| files_remove_handle(p))
}
        
pub fn build_files_get() -> impl Filter<Error = Rejection> {
    warp::get()
    .and(warp::path("api"))
    .and(warp::path("files"))
    .and(warp::path("get")).and(warp::path::end()).and(warp::query::<HashMap<String, String>>())
    .map(|p: HashMap<String, String>| files_get_handle(p))
}
        
pub fn build_files_search() -> impl Filter<Error = Rejection> {
    warp::get()
    .and(warp::path("api"))
    .and(warp::path("files"))
    .and(warp::path("search")).and(warp::path::end()).and(warp::query::<HashMap<String, String>>())
    .map(|p: HashMap<String, String>| files_search_handle(p))
}
        
pub fn build_posts_get() -> impl Filter<Error = Rejection> {
    warp::get()
    .and(warp::path("api"))
    .and(warp::path("posts"))
    .and(warp::path("get")).and(warp::path::end()).and(warp::query::<HashMap<String, String>>())
    .map(|p: HashMap<String, String>| posts_get_handle(p))
}
        
pub fn build_posts_post() -> impl Filter<Error = Rejection> {
    warp::get()
    .and(warp::path("api"))
    .and(warp::path("posts"))
    .and(warp::path("post")).and(warp::path::end()).and(warp::query::<HashMap<String, String>>())
    .map(|p: HashMap<String, String>| posts_post_handle(p))
}
        
pub fn build_posts_remove() -> impl Filter<Error = Rejection> {
    warp::get()
    .and(warp::path("api"))
    .and(warp::path("posts"))
    .and(warp::path("remove")).and(warp::path::end()).and(warp::query::<HashMap<String, String>>())
    .map(|p: HashMap<String, String>| posts_remove_handle(p))
}
        
pub fn build_posts_change() -> impl Filter<Error = Rejection> {
    warp::get()
    .and(warp::path("api"))
    .and(warp::path("posts"))
    .and(warp::path("change")).and(warp::path::end()).and(warp::query::<HashMap<String, String>>())
    .map(|p: HashMap<String, String>| posts_change_handle(p))
}
        
pub fn auth_handle(p: HashMap<String, String>) -> Response {
    println!("Auth handle!");
    unimplemented!()
}

pub fn users_get_handle(p: HashMap<String, String>) -> Response {
    todo!()
}

pub fn users_add_handle(p: HashMap<String, String>) -> Response {
    todo!()
}

pub fn users_change_handle(p: HashMap<String, String>) -> Response {
    todo!()
}

pub fn users_remove_handle(p: HashMap<String, String>) -> Response {
    todo!()
}

pub fn files_getmeta_handle(p: HashMap<String, String>) -> Response {
    todo!()
}

pub fn files_add_handle(p: bytes::Bytes) -> Response {
    todo!()
}

pub fn files_remove_handle(p: HashMap<String, String>) -> Response {
    todo!()
}

pub fn files_get_handle(p: HashMap<String, String>) -> Response {
    todo!()
}

pub fn files_search_handle(p: HashMap<String, String>) -> Response {
    todo!()
}

pub fn posts_get_handle(p: HashMap<String, String>) -> Response {
    todo!()
}

pub fn posts_post_handle(p: HashMap<String, String>) -> Response {
    todo!()
}

pub fn posts_remove_handle(p: HashMap<String, String>) -> Response {
    todo!()
}

pub fn posts_change_handle(p: HashMap<String, String>) -> Response {
    todo!()
}

// pub fn build() -> impl Filter<Error = Rejection> {
//     build_auth()
//     .or(build_users_get())
//     .or(build_users_add())
//     .or(build_users_change())
//     .or(build_users_remove())
//     .or(build_files_getmeta())
//     .or(build_files_add())
//     .or(build_files_remove())
//     .or(build_files_get())
//     .or(build_files_search())
//     .or(build_posts_get())
//     .or(build_posts_post())
//     .or(build_posts_remove())
//     .or(build_posts_change())
// }
