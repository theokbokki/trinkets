@javascript()
<script>
class App {
    constructor(el) {
        this.el = el;

        this.el.dataset.loaded = true;
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

    <noscript>
        <style>
            .app * {
                opacity: 1;
            }
        </style>
    </noscript>
</head>
<body class="app">
    <h1 class="sro">List of Théoo's trinkets</h1>
    {{ $slot }}
</body>
</html>

@css()
<style>
.app {
    margin: 0 auto;
    font-family: var(--sans);

    &:not([data-loaded=true]) * {
        opacity: 0;
    }
}

:where(.app *) {
    transition: opacity 400ms cubic-bezier(0.19, 1, 0.22, 1);
}
</style>
@endcss
