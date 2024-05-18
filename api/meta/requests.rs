
pub fn build_auth() -> impl Filter<Error = Rejection> {
    warp::get()
    .and(warp::path("auth"))
    .and(warp::path("auth")).and(warp::query::<HashMap<String, String>>())
    .map(|p: HashMap<String, String>| auth_handle(p))
}
    
pub fn build_foo() -> impl Filter<Error = Rejection> {
    warp::post()
    .and(warp::path("bar"))
    .and(warp::path("baz")).and(warp::query::<HashMap<String, String>>())
    .map(|p: HashMap<String, String>| foobar(p))
}
    
pub fn build_aaaaaaa() -> impl Filter<Error = Rejection> {
    warp::update()
    .and(warp::path("ooo"))
    .and(warp::path("eee")).and(warp::query::<HashMap<String, String>>())
    .map(|p: HashMap<String, String>| aaaaaaa_handle(p))
}
    
pub fn auth_handle(p: HashMap<String, String>) -> Response {
    
}
pub fn foobar(p: HashMap<String, String>) -> Response {
    
}
pub fn aaaaaaa_handle(p: HashMap<String, String>) -> Response {
    
}