<?php

namespace App\Filament\Admin\Resources\Servers;

use App\Filament\Admin\Resources\Servers\Pages\CreateServer;
use App\Filament\Admin\Resources\Servers\Pages\EditServer;
use App\Filament\Admin\Resources\Servers\Pages\ListServers;
use App\Filament\Admin\Resources\Servers\Pages\ManageNas;
use App\Filament\Admin\Resources\Servers\Pages\ManageService;
use App\Filament\Admin\Resources\Servers\Schemas\ServerForm;
use App\Filament\Admin\Resources\Servers\Tables\ServersTable;
use App\Models\Server;
use BackedEnum;
use Filament\Pages\Enums\SubNavigationPosition;
use Filament\Resources\Pages\Page;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ServerResource extends Resource
{
    protected static ?string $model = Server::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?SubNavigationPosition $subNavigationPosition = SubNavigationPosition::Top;

    protected static ?string $recordTitleAttribute = 'name';

    public static function getModelLabel(): string
    {
        return __('Server');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Servers');
    }

    public static function getNavigationLabel(): string
    {
        return __('Servers');
    }

    public static function getNavigationGroup(): string
    {
        return __('Servers Management');
    }

    public static function form(Schema $schema): Schema
    {
        return ServerForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ServersTable::configure($table);
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
            EditServer::class,
            ManageNas::class,
            ManageService::class,
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListServers::route('/'),
            'create' => CreateServer::route('/create'),
            'edit' => EditServer::route('/{record}/edit'),
            'manage-nas' => ManageNas::route('/{record}/manage-nas'),
            'manage-service' => ManageService::route('/{record}/manage-service'),
        ];
    }
}
