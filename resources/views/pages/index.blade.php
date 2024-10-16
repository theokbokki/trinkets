<?php
use Illuminate\View\View;
use App\Models\Trinket;
use function Laravel\Folio\name;
use function Laravel\Folio\render;

name('home');

render(function (View $view) {
    return $view->with('trinkets', Trinket::all());
});
?>

<x-layout>
    <x-intro />
    <section class="trinket-cards">
        <h2 class="sro">List of trinkets</h2>
        @foreach ($trinkets as $trinket)
            <x-trinket-card :$trinket />
        @endforeach
    </section>
</x-layout>

@css()
<style>
.trinket-cards {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(11.25rem, 1fr));
    gap: 1rem;
    max-width: 60.25rem;
    padding: 0 2rem;
    margin: 0 auto;
}
</style>
@endcss
