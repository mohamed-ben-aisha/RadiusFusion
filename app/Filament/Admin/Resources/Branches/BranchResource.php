<?php

namespace App\Filament\Admin\Resources\Branches;

use App\Filament\Admin\Resources\Branches\Pages\CreateBranch;
use App\Filament\Admin\Resources\Branches\Pages\EditBranch;
use App\Filament\Admin\Resources\Branches\Pages\ListBranches;
use App\Filament\Admin\Resources\Branches\Pages\ManageReseller;
use App\Filament\Admin\Resources\Branches\Pages\ManageUsers;
use App\Filament\Admin\Resources\Branches\Schemas\BranchForm;
use App\Filament\Admin\Resources\Branches\Tables\BranchesTable;
use App\Models\Branch;
use BackedEnum;
use Filament\Pages\Enums\SubNavigationPosition;
use Filament\Resources\Pages\Page;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class BranchResource extends Resource
{
    protected static ?string $model = Branch::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Top;

    protected static ?string $recordTitleAttribute = 'name';

    public static function getModelLabel(): string
    {
        return __('Branch');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Branches');
    }

    public static function getNavigationLabel(): string
    {
        return __('Branches');
    }

    public static function getNavigationGroup(): string
    {
        return __('Company');
    }

    public static function form(Schema $schema): Schema
    {
        return BranchForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BranchesTable::configure($table);
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
            EditBranch::class,
            ManageReseller::class,
            ManageUsers::class,
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListBranches::route('/'),
            'create' => CreateBranch::route('/create'),
            'edit' => EditBranch::route('/{record}/edit'),
            'manage-reseller' => ManageReseller::route('/{record}/manage-reseller'),
            'manage-users' => ManageUsers::route('/{record}/manage-users'),
        ];
    }
}
