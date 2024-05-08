mod api;
mod state;

use std::{fs::File, io::Read, sync::Arc};

use api::{get, post};
use parking_lot::RwLock;
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
    let confile: File = File::open("./config.toml").unwrap();
    let mut contents = String::new();
    confile.read_to_string(&mut contents);
    let config: Config = toml::from_str(&contents).unwrap();

    let get_points   =  get::build();
    let post_points  = post::build();

    let current_state = state::ActionHandler;

    let state_filter = warp::any().map(move || current_state.clone());

    let routes = get_points.or(post_points);

    warp::serve(routes)
        .run((config.ipaddr, config.port))
        .await;
}
