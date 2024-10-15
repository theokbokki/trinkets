

class App {
    constructor(el) {
        this.el = el;

        this.el.dataset.loaded = true;
    }
}

document.querySelectorAll('.app').forEach((el) => new App(el));


