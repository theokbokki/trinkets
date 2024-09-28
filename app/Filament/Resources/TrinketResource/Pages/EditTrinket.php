<?php

namespace App\Filament\Resources\TrinketResource\Pages;

use App\Filament\Resources\TrinketResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTrinket extends EditRecord
{
    protected static string $resource = TrinketResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
