<nav class="nav">
    <div>
        <h1 class="nav__title">Trinkets</h1>
    </div>
    <div>
        <a href="/#about" class="nav__about">
            <span class="nav__icon">?</span>
            <span class="sro">About Trinkets</span>
        </a>
    </div>
</nav>

@css()
<style>
.nav {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.nav__title {
    text-transform: uppercase;
    font-weight: 600;
}

.nav__about {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 1.5rem;
    aspect-ratio: 1/1;
    font-size: .875rem;
    text-decoration: none;
    color: var(--grey-600);
    background: var(--white);
    border-radius: 50%;

    &:hover {
        box-shadow: 0 0 0 1px var(--grey-300);
    }
}
</style>
@endcss
