<?php
use Illuminate\View\View;
use App\Models\Trinket;
use function Laravel\Folio\name;
use function Laravel\Folio\render;

name('home');

render(function (View $view) {
    return $view->with('trinkets', Trinket::all());
});
?>

@javascript()
<script>
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
</script>
@endjavascript

<x-layout>
<x-nav />
<div class="trinket-cards">
@foreach ($trinkets as $trinket)
    <x-trinket-card :$trinket />
@endforeach
</div>
</x-layout>

@css()
<style>
.trinket-cards {
    max-width: 49rem;
    margin: 4rem auto 0;
    position: relative;
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(15rem,1fr));
    gap: 2rem
}
</style>
@endcss
