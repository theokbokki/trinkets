<section class="intro">
    <h2 class="intro__title">Trinkets</h2>
    <p class="intro__text">Trinkets is a place where I collect stuff I find pretty, be it in real life or on the internet.</p>
    <p class="intro__text">It was inspired by <a href="https://designlobster.substack.com/p/nice-things-a-personal-essay" class="intro__link">this article</a>, you can find <a href="https://github.com/theokbokki/trinkets" class="intro__link">the code here</a>.</p>
</section>

@css()
<style>
.intro {
    max-width: 26.25rem;
    padding: 0 2rem;
    margin: 4rem auto 2.5rem;
}

.intro__title {
    color: var(--grey-900);
}

.intro__text {
    margin-top: 2rem;
    font-size: .875rem;
    line-height: 150%;
    color: var(--grey-500);
}

.intro__link {
    color: var(--grey-500);
    text-underline-offset: .125rem;
    transition: color 100ms ease-out;

    &:hover {
        color: var(--grey-900);
    }
}

@media screen and (min-width: 40rem) {
    .intro {
        margin: 7.5rem auto 5rem;
    }
}
</style>
@endcss
