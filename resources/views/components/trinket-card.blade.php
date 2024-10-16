<figure class="trinket-card">
    <a href="{{ route('trinket', ['trinket' => $trinket]) }}" class="trinket-card__link" data-transition="true">
        <span class="sro">{{ $trinket->title }}</span>
    </a>
    <img src="{{ Storage::url($trinket->image) }}" alt="{{ $trinket->image_alt }}" class="trinket-card__image">
</figure>

@css()
<style>
.trinket-card {
    position: relative;
    padding: 1rem;
    background: var(--grey-50);
}

.trinket-card__image {
    width: 100%;
    aspect-ratio: 1/1;
    object-fit: contain;
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
