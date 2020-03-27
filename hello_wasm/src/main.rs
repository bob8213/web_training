#[macro_use]
extern crate stdweb;

use stdweb::{
    console
};

fn main() {
    stdweb::initialize();

    console!(log, "Hello, wasm");

    stdweb::event_loop();
}

#[js_export]
fn button_clicked() {
    console!(log, "Button Clicked");
}
