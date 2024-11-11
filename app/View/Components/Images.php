<?php

namespace App\View\Components;

use App\Models\Trinket;
use Illuminate\View\Component;
use Statikbe\FilamentFlexibleContentBlocks\ContentBlocks\AbstractContentBlock;
use Statikbe\FilamentFlexibleContentBlocks\FilamentFlexibleBlocksConfig;
use Statikbe\FilamentFlexibleContentBlocks\Models\Contracts\HasContentBlocks;

class Images extends Component
{
    /**
     * @var array|AbstractContentBlock[]
     */
    public array $contentBlocks = [];

    public function __construct(HasContentBlocks&Trinket $trinket)
    {
        $this->contentBlocks = $trinket->createBlocks($trinket);
    }

    public function render()
    {
        return view('components.images');
    }

    /**
     * Return an array of strings with searchable content of all blocks.
     *
     * @return array<string>
     */
    public function getSearchableContent(): array
    {
        $searchable = [];
        foreach ($this->contentBlocks as $contentBlock) {
            /* @var AbstractContentBlock $contentBlock */
            $searchable = array_merge($searchable, $contentBlock->getSearchableContent());
        }

        return $searchable;
    }
}
