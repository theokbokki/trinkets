<?php

namespace App\View\Components;

use App\Models\Trinket;
use Illuminate\View\Component;
use Statikbe\FilamentFlexibleContentBlocks\ContentBlocks\AbstractContentBlock;
use Statikbe\FilamentFlexibleContentBlocks\FilamentFlexibleBlocksConfig;
use Statikbe\FilamentFlexibleContentBlocks\Models\Contracts\HasContentBlocks;

class TrinketCard extends Component
{
    /**
     * @var array|AbstractContentBlock[]
     */
    public array $contentBlocks = [];

    public HasContentBlocks $trinket;


    public function __construct(HasContentBlocks&Trinket $trinket)
    {
        $this->contentBlocks = $trinket->createBlocks($trinket);
        $this->trinket = $trinket;
    }

    public function render()
    {
        return view('components.trinket-card');
    }
}
