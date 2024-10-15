<?php
use function Laravel\Folio\name;

name('trinket');
?>

<x-layout>
    <section class="trinket">
        <h2 class="trinket__title">{{ $trinket->title }}</h2>
        <p class="trinket__excerpt">{{ $trinket->excerpt }}</p>
        <a href="{{ $trinket->link }}" class="trinket__link">View original</a>
        <figure class="trinket__figure">
            <img src="{{ Storage::url($trinket->image) }}" alt="{{ $trinket->image_alt }}" class="trinket__image">
        </figure>
        <a href="{{ route('home') }}" class="trinket__back">
            <span class="trinket__icon">
                {!! Vite::content('resources/icons/back.svg') !!}
            </span>
            <span>Back</span>
        </a>
    </section>
</x-layout>

@css()
<style>
.trinket {
    display: flex;
    flex-direction: column;
    max-width: 32.5rem;
    padding: 0 2rem;
    margin: 7.5rem auto 5rem;
}

.trinket__title {
    margin-top: 2.5rem;
    color: var(--grey-900);
    line-height: 150%;
}

.trinket__excerpt {
    color: var(--grey-900);
    line-height: 150%;
}

.trinket__link {
    margin-top: 2rem;
    text-underline-offset: .125rem;
    color: var(--grey-500);

    &:hover {
        color: var(--grey-900);
    }
}

.trinket__figure {
    width: 100%;
    order: -1;
}

.trinket__image {
    width: 100%;
}

.trinket__back {
    position: absolute;
    top: 5rem;
    color: var(--grey-600);
    text-decoration: none;
}

.trinket__back:hover {
    color: var(--grey-900);
}

.trinket__back:hover span + span {
    box-shadow: 0px 2px 0px -1px;
}


.trinket__back span + span {
    box-shadow: 0px 2px 0px -1px transparent;
}

@media screen and (min-width: 63.75rem) {
    .trinket__back {
        top: 7.5rem;
        left: 10rem;
    }
}
</style>
@endcss
