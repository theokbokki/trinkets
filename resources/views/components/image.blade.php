<figure class="trinket__figure">
    <img src="{{ $getImageUrl }}" alt="{{ $imageAlt }}" class="trinket__image">
</figure>

@css()
<style>
.trinket__figure {
    width: 100%;
    flex-grow: 1;
    min-width: 32.5rem;
}

.trinket__image {
    width: 100%;
}
</style>
@endcss
