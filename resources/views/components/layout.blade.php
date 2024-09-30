@javascript()
<script>
class App {
    constructor() {
        document.querySelectorAll('.trinket-cards').forEach(el => {
            new TrinketCards(el);
        });

        document.querySelectorAll('.sidebar').forEach(el => {
            new Sidebar(el);
        });

        document.querySelectorAll('.about').forEach(el => {
            new About(el);
        });

        document.body.dataset.loaded = true;
    }
}

addEventListener('load', () => new App());
</script>

@endjavascript

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trinkets</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <noscript>
        <style>
            .app * {
                opacity: 1;
            }

            .sidebar__background, .about__background {
                opacity: .3;
            }

            .sidebar__content {
                transform: none;
            }
        </style>
    </noscript>
</head>
<body class="app">
    {{ $slot }}
</body>
</html>

@css()
<style>
.app {
    max-width: 75rem;
    margin: 0 auto;
    padding: 2rem;
    font-family: var(--sans);
    background: var(--grey-100);

    &:not([data-loaded=true]) * {
        opacity: 0;
    }
}

:where(.app *) {
    transition: opacity 400ms cubic-bezier(0.19, 1, 0.22, 1);
}

@media screen and (min-width: 37.5rem) {
    .app {
        padding: 2.5rem;
    }
}
</style>
@endcss
