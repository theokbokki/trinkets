<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Statikbe\FilamentFlexibleContentBlocks\Models\Concerns\HasDefaultContentBlocksTrait;
use Statikbe\FilamentFlexibleContentBlocks\Models\Concerns\HasMediaAttributesTrait;
use Statikbe\FilamentFlexibleContentBlocks\Models\Contracts\HasContentBlocks;
use Statikbe\FilamentFlexibleContentBlocks\Models\Contracts\HasHeroImageAttributes;
use Statikbe\FilamentFlexibleContentBlocks\Models\Contracts\HasMediaAttributes;

class Trinket extends Model implements HasContentBlocks, HasMedia, HasMediaAttributes
{
    use HasDefaultContentBlocksTrait;
    use HasFactory;
    use InteractsWithMedia;
    use HasMediaAttributesTrait;
    use SoftDeletes;
    use HasSlug;

    protected $fillable = [
        'title',
        'excerpt',
        'image',
        'image_alt',
        'link',
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    /**
     * Transforms the JSON block data into content block components that can be rendered.
     *
     * @return array<AbstractContentBlock>
     */
    public function createBlocks(HasContentBlocks&Trinket $trinket): array
    {
        $blockClasses = $trinket::registerContentBlocks();
        $blockClassIndex = collect($blockClasses)->mapWithKeys(fn ($item, $key) => [$item::getName() => $item]);
        $blocks = [];

        foreach ($trinket->content_blocks as $blockData) {
            if (isset($blockData['type']) && $blockClassIndex->has($blockData['type'])) {
                $blockClass = $blockClassIndex->get($blockData['type']);
                $blocks[] = new $blockClass($trinket, $blockData['data']);
            }
        }

        return $blocks;
    }
}
