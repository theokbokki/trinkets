
class TrinketCards {
    constructor(el) {
        this.el = el;
        this.getElements();
        this.setDefaults();
        this.setEvents();
        this.calculatePosition();
    }

    getElements() {
        this.cards = this.el.querySelectorAll('.trinket-card');
    }

    setDefaults() {
        const gridStyles = getComputedStyle(this.el);
        this.colCount = gridStyles.getPropertyValue('grid-template-columns').split(' ').length;
        this.gap = parseInt(gridStyles.getPropertyValue('gap'));
        this.cardWidth = (this.el.offsetWidth - (this.colCount - 1) * this.gap) / this.colCount;
    }

    setEvents() {
        window.addEventListener('resize', this.handleResize.bind(this));
    }

    calculatePosition() {
        let cardArrays = [];
        for(let i = 0; i < this.colCount; i++) {
            cardArrays[i] = [];
        }

        this.cards.forEach((card, index) => {
            cardArrays[index % this.colCount].push(card);
            card.style.position = 'absolute';
            card.style.width = this.cardWidth + 'px';
        });

        cardArrays.forEach((cards, i) => {
            let currentTop = 0;

            cards.forEach((card, j) => {
                card.style.left = (this.cardWidth + this.gap) * i  + 'px';

                if (!j) {
                    card.style.top = currentTop +'px';
                    return;
                }

                currentTop += parseInt(cards[j - 1].offsetHeight) + this.gap;
                card.style.top = currentTop +'px';
            });
        })
    }

    handleResize() {
        this.setDefaults();
        this.calculatePosition();
    }
}


class Sidebar {
    constructor(el) {
        this.el = el;
        this.getElements();
        this.setEventListeners();
    }

    getElements() {
        this.name = this.el.getAttribute("id");
        this.background = this.el.querySelector(".sidebar__background");
        this.content = this.el.querySelector(".sidebar__content");
        this.closeElement = this.el.querySelector(".sidebar__close");
        this.openElement = document.querySelector(
            `[data-sidebar="${this.name}"]`,
        );
    }

    setEventListeners() {
        this.el.addEventListener("click", (e) => {
            if (e.target === this.background) {
                this.close(e)
            }
        });

        this.closeElement.addEventListener("click", (e) => this.close(e));

        this.openElement.addEventListener("click", (e) => this.open(e));

        window.addEventListener("keydown", (e) => {
            if (this.isOpen() && e.key === "Escape") {
                this.close(e);
            }
        });
    }

    isOpen() {
        return this.el.classList.contains("sidebar--open");
    }

    close(e) {
        e.preventDefault();

        document.body.classList.remove('bodyblock');
        this.el.classList.remove("sidebar--open");
    }

    open(e) {
        e.preventDefault();

        document.body.classList.add('bodyblock');
        this.el.classList.add("sidebar--open");
        this.content.scrollTop = 0;
    }
}


class App {
    constructor() {
        document.querySelectorAll('.trinket-cards').forEach(el => {
            new TrinketCards(el);
        });

        document.querySelectorAll('.sidebar').forEach(el => {
            new Sidebar(el);
        });
    }
}

addEventListener('load', () => new App());


