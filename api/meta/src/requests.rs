use warp::Filter;
use warp::reply::Response;
use std::collections::HashMap;
use warp::Rejection;

pub fn build_foo() -> impl Filter<Error = Rejection> {
    warp::get()
    .and(warp::path("foo"))
    .and(warp::path("bar"))
    .and(warp::path("baz")).and(warp::path::end()).and(warp::query::<HashMap<String, String>>())
    .map(|p: HashMap<String, String>| foo_handle(p))
}
        
pub fn build_auth() -> impl Filter<Error = Rejection> {
    warp::post()
    .and(warp::path("auth")).and(warp::path::end()).and(warp::body::bytes()).map(|p: bytes::Bytes| auth123(p))
}
        
pub fn foo_handle(p: HashMap<String, String>) -> Response {
    todo!()
}

pub fn auth123(p: bytes::Bytes) -> Response {
    todo!()
}
