@javascript()
<script>
class About {
    constructor(el) {
        this.el = el;
        this.getElements();
        this.setEventListeners();
    }

    getElements() {
        this.name = this.el.getAttribute("id");
        this.background = this.el.querySelector(".about__background");
        this.content = this.el.querySelector(".about__content");
        this.closeElement = this.el.querySelector(".about__close");
        this.openElement = document.querySelector('[href="#about"]');
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
        return this.el.classList.contains("about--open");
    }

    close(e) {
        e.preventDefault();

        document.body.classList.remove('bodyblock');
        this.el.classList.remove("about--open");

        setTimeout(() => {
            this.el.style.display = 'none';
        }, 500);
    }

    open(e) {
        e.preventDefault();

        document.body.classList.add('bodyblock');
        this.el.style.display = 'block';
        this.content.scrollTop = 0;

        setTimeout(() => {
            this.el.classList.add("about--open");
        }, 10)
    }
}
</script>
@endjavascript

<div class="about" id="about">
    <div>
        <a href="#" class="about__background"><span class="sro">Close about popup</span></a>
    </div>
    <div class="about__content">
        <a href="#" class="about__close">
            {!! Vite::content('resources/icons/close.svg') !!}
            <span class="sro">Close about popup</span>
        </a>
        <p>Trinkets is a place where I collect stuff I find pretty, be it in real life or on the internet.</p>
        <p>It was inspired by <a href="https://designlobster.substack.com/p/nice-things-a-personal-essay" target="_blank">this article</a> and by websites like pinterest or cosmos.</p>
        <p>You can find the code <a href="https://github.com/theokbokki/trinkets" target="_blank">here</a>.</p>
    </div>
</div>

@css()
<style>
.about {
    position: fixed;
    inset: 0;
    z-index: 1;

    &:not(:target, .about--open) {
        display: none;
    }
}

.about__content {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%) scale(.95);
    min-width: 0;
    width: calc(100vw - 5rem);
    max-width: 20rem;
    padding: 2.5rem 2.5rem;
    line-height: 150%;
    background: white;
    opacity: 0;
    transition: transform 500ms cubic-bezier(0.19, 1, 0.22, 1),
        opacity 400ms cubic-bezier(0.19, 1, 0.22, 1);

    p {
        margin-top: 1.25rem;
        color: var(--grey-900);
    }

    a {
        color: var(--grey-600);

        &:hover {
            color: var(--grey-900);
        }
    }
}

.about__close {
    position: absolute;
    top: 1.5rem;
    right: 1.5rem;
    display: block;
    width: 1.5rem;
    aspect-ratio: 1/1;
    color: var(--grey-600);
}

.about__background {
    position: absolute;
    inset: 0;
    background: var(--grey-600);
    opacity: 0;
    transition: opacity 250ms cubic-bezier(0.19, 1, 0.22, 1);
}

.about--open .about__background {
    opacity: .3;
}

.about--open .about__content {
    transform: translate(-50%, -50%) scale(1);
    opacity: 1;
}
</style>
@endcss
