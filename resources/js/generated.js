
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


class App {
    constructor() {
        document.querySelectorAll('.trinket-cards').forEach(el => {
            new TrinketCards(el);
        });
    }
}

addEventListener('load', () => new App());


