<figure class="trinket-card">

    <a href="{{ route('trinket', ['trinket' => $trinket]) }}" class="trinket-card__link" data-transition="true">
        <span class="sro">{{ $trinket->title }}</span>
    </a>
    @if(is_array($contentBlocks))
        @foreach($contentBlocks ?? [] as $index => $block)
            @if($index === 0)
                <img src="{!! $block->getImageUrl() !!}" alt="{{ $block->imageAlt }}" class="trinket-card__image">
            @endif
        @endforeach
    @endif
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
