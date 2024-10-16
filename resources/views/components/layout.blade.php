@javascript()
<script>
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
</script>
@endjavascript

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trinkets</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="app">
    <script>
        document.body.style.transition = 'none';
        document.body.classList.add('hidden');
    </script>

    <h1 class="sro">List of Théoo's trinkets</h1>

    {{ $slot }}
</body>
</html>

@css()
<style>
.app {
    margin: 0 auto;
    font-family: var(--sans);
}

:where(.app) {
    transition: opacity 300ms ease-out,
        transform 300ms ease-out;
}

:where(.app.hidden) {
    opacity: 0;
    transform: translateY(.5rem);
}
</style>
@endcss
