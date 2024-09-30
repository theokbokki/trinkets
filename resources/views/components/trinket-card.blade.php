@use('Illuminate\Support\Facades\Storage')

<figure class="trinket-card">
    <a href="#{{ $trinket->slug }}" class="trinket-card__link" data-sidebar="{{ $trinket->slug }}"><span class="sro">{{ $trinket->title }}</span></a>
    <img src="{{ $trinket->image }}" alt="{{ $trinket->image_alt }}" class="trinket-card__image">
</figure>

@css()
<style>
.trinket-card {
    position: relative;
    width: 20rem;
    max-width: 100%;
    margin: 0 auto;
    transition: 500ms transform cubic-bezier(0.19, 1, 0.22, 1);

    &:hover {
        transform: scale(.95);
    }
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
