<div class="trinket__figures">
    @if(is_array($contentBlocks))
        @foreach($contentBlocks ?? [] as $block)
            {{
                $block->withAttributes($attributes->getAttributes())
                    ->render()
                    ->with($block->data())
            }}
        @endforeach
    @endif
</div>

@css()
<style>
.trinket__figures {
    width: 100%;
    display: grid;
    gap: 2rem;
    margin-top: 2.5rem;
}
</style>
@endcss
