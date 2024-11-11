<?php
use function Laravel\Folio\name;

name('trinket');
?>

<x-layout>
    <section class="trinket">
        <h2 class="trinket__title">{{ $trinket->title }}</h2>
        <p class="trinket__excerpt">{{ $trinket->excerpt }}</p>
        <a href="{{ $trinket->link }}" class="trinket__link">View original</a>
        <x-images :trinket="$trinket"/>
        <a href="{{ route('home') }}" class="trinket__back" data-transition="true">
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
    position: relative;
    display: flex;
    flex-direction: column;
    max-width: 32.5rem;
    padding: 0 2rem;
    margin: 6.5rem auto 2.5rem;
}

.trinket__title {
    color: var(--grey-900);
    line-height: 150%;
}

.trinket__excerpt {
    color: var(--grey-900);
    line-height: 150%;
}

.trinket__link {
    width: max-content;
    margin-top: 2rem;
    text-underline-offset: .125rem;
    color: var(--grey-500);
    transition: color 100ms ease-out;

    &:hover {
        color: var(--grey-900);
    }
}

.trinket__back {
    position: absolute;
    top: -2.5rem;
    color: var(--grey-600);
    text-decoration: none;
    transition: color 100ms ease-out;
}

.trinket__back:hover {
    color: var(--grey-900);
}

.trinket__back span + span {
    box-shadow: 0px 2px 0px -1px transparent;
    transition: box-shadow 150ms ease-out;
}

.trinket__back:hover span + span {
    box-shadow: 0px 2px 0px -1px;
}

@media screen and (min-width: 40rem) {
    .trinket {
        margin: 9.5rem auto 5rem;
    }
}

@media screen and (min-width: 63.75rem) {
    .trinket__back {
        top: 0;
        left: -10rem;
    }
}
</style>
@endcss
