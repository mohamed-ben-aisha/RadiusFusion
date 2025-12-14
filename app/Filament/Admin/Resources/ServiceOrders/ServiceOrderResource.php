<?php

namespace App\Filament\Admin\Resources\ServiceOrders;

use App\Filament\Admin\Resources\ServiceOrders\Pages\CreateServiceOrder;
use App\Filament\Admin\Resources\ServiceOrders\Pages\EditServiceOrder;
use App\Filament\Admin\Resources\ServiceOrders\Pages\ListServiceOrders;
use App\Filament\Admin\Resources\ServiceOrders\Schemas\ServiceOrderForm;
use App\Filament\Admin\Resources\ServiceOrders\Tables\ServiceOrdersTable;
use App\Models\ServiceOrder;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ServiceOrderResource extends Resource
{
    protected static ?string $model = ServiceOrder::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'client_id';

    public static function getModelLabel(): string
    {
        return __('Service Order');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Service Orders');
    }

    public static function getNavigationLabel(): string
    {
        return __('Service Orders');
    }

    public static function getNavigationGroup(): string
    {
        return __('Clients');
    }

    public static function form(Schema $schema): Schema
    {
        return ServiceOrderForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ServiceOrdersTable::configure($table);
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
            'index' => ListServiceOrders::route('/'),
            'create' => CreateServiceOrder::route('/create'),
            'edit' => EditServiceOrder::route('/{record}/edit'),
        ];
    }
}
