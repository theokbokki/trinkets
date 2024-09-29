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
}

@media screen and (min-width: 37.5rem) {
    .app {
        padding: 2.5rem;
    }
}
</style>
@endcss
