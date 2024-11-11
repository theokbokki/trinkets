<?php

namespace App\ContentBlocks;

use Closure;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Spatie\MediaLibrary\HasMedia;
use Statikbe\FilamentFlexibleContentBlocks\ContentBlocks\AbstractContentBlock;
use Statikbe\FilamentFlexibleContentBlocks\ContentBlocks\Concerns\HasImage;
use Statikbe\FilamentFlexibleContentBlocks\Filament\Form\Fields\Blocks\BlockSpatieMediaLibraryFileUpload;
use Statikbe\FilamentFlexibleContentBlocks\Models\Contracts\HasContentBlocks;

class CustomImageBlock extends AbstractContentBlock
{
    use HasImage;

    public ?string $imageAlt;

    public function __construct(HasContentBlocks&HasMedia $record, ?array $blockData)
    {
        parent::__construct($record, $blockData);

        $this->imageAlt = $blockData['image_alt'] ?? null;
    }

    public function render()
    {
        return view('components.image');
    }

    public static function getName(): string
    {
        return 'image';
    }

    public static function getIcon(): string
    {
        return 'heroicon-o-camera';
    }

    public static function getLabel(): string
    {
        return 'Image';
    }

    public static function getFieldLabel(string $field): string
    {
        return match ($field) {
            'image' => 'Image',
            'image_alt' => 'Image alt',
        };
    }

    protected static function makeFilamentSchema(): array|Closure
    {
        return [
            Grid::make(1)->schema([
                BlockSpatieMediaLibraryFileUpload::make('image')
                    ->collection(static::getName())
                    ->label(static::getFieldLabel('image'))
                    ->maxFiles(1),
                TextInput::make('image_alt')
                    ->label(static::getFieldLabel('image_alt'))
                    ->maxLength(255),
            ]),
        ];
    }

    public function getImageUrl(): ?string
    {
        return $this->getMediaUrl(blockId: $this->getBlockId());
    }

    public function getSearchableContent(): array
    {
        $searchable = [];

        $this->addSearchableContent($searchable, $this->imageAlt);

        return $searchable;
    }
}
