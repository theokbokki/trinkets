@use('Illuminate\Support\Facades\Storage')

<figure class="trinket-card">
    <a href="/#{{ $trinket->slug }}" class="trinket-card__link" data-sidebar="{{ $trinket->slug }}"><span class="sro">{{ $trinket->title }}</span></a>
    <img src="/storage/{{ $trinket->image }}" alt="{{ $trinket->image_alt }}" class="trinket-card__image">
</figure>

@css()
<style>
.trinket-card {
    position: relative;
    width: 20rem;
    max-width: 100%;
    margin: 0 auto;
}

.trinket-card__image {
    width: 100%;
}

.trinket-card__link {
    &:before {
        content: "";
        position: absolute;
        inset: 0;
    }
}
</style>
@endcss
