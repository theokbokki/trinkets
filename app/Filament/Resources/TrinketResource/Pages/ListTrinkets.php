<?php

namespace App\Filament\Resources\TrinketResource\Pages;

use App\Filament\Resources\TrinketResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTrinkets extends ListRecords
{
    protected static string $resource = TrinketResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
