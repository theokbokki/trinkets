@use('Illuminate\Support\Facades\Storage')

<figure class="trinket-card">
    <a href="/#{{ $trinket->slug }}" class="sro">{{ $trinket->title }}</a>
    <img src="/storage/{{ $trinket->image }}" alt="{{ $trinket->image_alt }}" class="trinket-card__image">
</figure>

@css()
<style>
.trinket-card {
    width: 20rem;
    max-width: 100%;
    margin: 0 auto;
}

.trinket-card__image {
    width: 100%;
}

@media screen and (min-width: 37.5rem) {
    .trinket-card {
    }
}
</style>
@endcss
