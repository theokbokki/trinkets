<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TrinketResource\Pages;
use App\Filament\Resources\TrinketResource\RelationManagers;
use App\Models\Trinket;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TrinketResource extends Resource
{
    protected static ?string $model = Trinket::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required(),

                Textarea::make('excerpt')
                    ->required(),

                FileUpload::make('image')
                    ->directory('images')
                    ->required(),

                TextInput::make('image_alt')
                    ->required(),

                TextInput::make('link')
                    ->url(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->description(fn (Trinket $record): string => $record->excerpt),

                ImageColumn::make('image'),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTrinkets::route('/'),
            'create' => Pages\CreateTrinket::route('/create'),
            'edit' => Pages\EditTrinket::route('/{record}/edit'),
        ];
    }
}
