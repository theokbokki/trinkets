

class App {
    constructor(el) {
        this.el = el;

        requestAnimationFrame(() => {
            this.el.style = '';
            this.el.classList.remove('hidden');
        });

        this.getElements();
        this.setEvents();
    }

    getElements() {
        this.transitionLinks = this.el.querySelectorAll('[data-transition=true]');
    }

    setEvents() {
        this.transitionLinks.forEach(link => {
            link.addEventListener('click', this.handleTransition.bind(this));
        })
    }

    handleTransition(e) {
        e.preventDefault();
        const link = e.currentTarget.href;

        this.el.classList.add('hidden');

        setTimeout(() => {
            window.location = link;
        }, 300)
    }
}

document.querySelectorAll('.app').forEach((el) => new App(el));


