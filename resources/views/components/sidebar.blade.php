@javascript()
<script>
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
</script>
@endjavascript

<article class="sidebar" id="{{ $trinket->slug }}">
    <div>
        <a href="#" class="sidebar__background"><span class="sro">Close sidebar</span></a>
    </div>
    <div class="sidebar__content">
        <div class="sidebar__close">
            <a href="#">
                <span class="sro">Close sidebar</span>
                {!! Vite::content('resources/icons/close.svg') !!}
            </a>
        </div>
        <div class="sidebar__text">
            <h3 class="sidebar__title">{{ $trinket->title }}</h3>
            <p class="sidebar__excerpt">{{ $trinket->excerpt }}</p>
            @isset($trinket->link)
                <a href="{{ $trinket->link }}" class="sidebar__link" target="_blank">View original</a>
            @endisset
        </div>
        <figure class="sidebar__figure">
            <img src="/storage/{{ $trinket->image }}" alt="{{ $trinket->image_alt }}" class="sidebar__image">
        </figure>
    </div>
</article>

@css()
<style>
.sidebar {
    position: fixed;
    inset: 0;
    z-index: 2;
    backdrop-filter: blur(2px);

    &:not(:target, .sidebar--open) {
        display: none;
    }
}

.sidebar__background {
    position: absolute;
    inset: 0;
    background: var(--grey-600);
    opacity: .3;
}

.sidebar__content {
    position: absolute;
    top: 0;
    bottom: 0;
    display: flex;
    flex-direction: column;
    padding: 7.5rem 1.5rem 5rem;
    background: var(--grey-100);
    overflow: scroll;
    overscroll-behavior: contain;
}

.sidebar__close {
    position: absolute;
    top: 2.5rem;
    right: 1.5rem;
    order: 0;
    width: 1.5rem;
    aspect-ratio: 1/1;

    a {
        color: var(--grey-600);
    }
}

.sidebar__figure {
    order: 1;
    min-width: 0;
    width: 100%;
    max-width: 25rem;
}

.sidebar__image {
    width: 100%;
}

.sidebar__text {
    order: 2;
    min-width: 0;
    width: 100%;
    max-width: 25rem;
    margin-top: 1rem;
    line-height: 150%;
    color: var(--grey-900);
}

.sidebar__link {
    display: inline-block;
    margin-top: 2.5rem;
    color: var(--grey-600);

    &:hover {
        color: var(--grey-900);
    }
}

@media screen and (min-width: 35rem) {
    .sidebar__content {
        padding: 7.5rem 5rem 5rem;
    }

    .sidebar__close {
        right: 2.5rem;
    }
}
</style>
@endcss
