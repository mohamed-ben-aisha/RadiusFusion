<?php

namespace App\Filament\Admin\Resources\CardBatches;

use App\Filament\Admin\Resources\CardBatches\Pages\CreateCardBatche;
use App\Filament\Admin\Resources\CardBatches\Pages\EditCardBatche;
use App\Filament\Admin\Resources\CardBatches\Pages\ListCardBatches;
use App\Filament\Admin\Resources\CardBatches\Schemas\CardBatcheForm;
use App\Filament\Admin\Resources\CardBatches\Tables\CardBatchesTable;
use App\Models\CardBatche;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class CardBatcheResource extends Resource
{
    protected static ?string $model = CardBatche::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'batch_code';

    public static function getModelLabel(): string
    {
        return __('Card Batch');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Card Batches');
    }

    public static function getNavigationLabel(): string
    {
        return __('Card Batches');
    }

    public static function getNavigationGroup(): string
    {
        return __('Cards Management');
    }

    public static function form(Schema $schema): Schema
    {
        return CardBatcheForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CardBatchesTable::configure($table);
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
            'index' => ListCardBatches::route('/'),
            'create' => CreateCardBatche::route('/create'),
            'edit' => EditCardBatche::route('/{record}/edit'),
        ];
    }
}
