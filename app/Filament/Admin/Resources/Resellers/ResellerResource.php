<?php

namespace App\Filament\Admin\Resources\Resellers;

use App\Filament\Admin\Resources\Resellers\Pages\CreateReseller;
use App\Filament\Admin\Resources\Resellers\Pages\EditReseller;
use App\Filament\Admin\Resources\Resellers\Pages\ListResellers;
use App\Filament\Admin\Resources\Resellers\Pages\ManageTransactions;
use App\Filament\Admin\Resources\Resellers\Schemas\ResellerForm;
use App\Filament\Admin\Resources\Resellers\Tables\ResellersTable;
use App\Models\Reseller;
use BackedEnum;
use Filament\Pages\Enums\SubNavigationPosition;
use Filament\Resources\Pages\Page;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ResellerResource extends Resource
{
    protected static ?string $model = Reseller::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Top;

    public static function getModelLabel(): string
    {
        return __('Reseller');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Resellers');
    }

    public static function getNavigationLabel(): string
    {
        return __('Resellers');
    }

    public static function getNavigationGroup(): string
    {
        return __('Company');
    }

    public static function form(Schema $schema): Schema
    {
        return ResellerForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ResellersTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getRecordSubNavigation(Page $page): array
    {
        return $page->generateNavigationItems([
            EditReseller::class,
            ManageTransactions::class,
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListResellers::route('/'),
            'create' => CreateReseller::route('/create'),
            'edit' => EditReseller::route('/{record}/edit'),
            'manage-transactions' => ManageTransactions::route('/{record}/manage-transactions'),
        ];
    }
}
