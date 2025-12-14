<?php

namespace App\Filament\Admin\Resources\Branches\Pages;

use App\Filament\Admin\Resources\Branches\BranchResource;
use App\Filament\Admin\Resources\Branches\Tables\UsersTable;
use Filament\Resources\Pages\ManageRelatedRecords;
use Filament\Tables\Table;

class ManageUsers extends ManageRelatedRecords
{
    protected static string $resource = BranchResource::class;

    protected static string $relationship = 'users';

    public static function getNavigationLabel(): string
    {
        return __('Users');
    }

    public function getTitle(): string
    {
        return __('Users').' - '.$this->getOwnerRecord()->name;
    }

    public function table(Table $table): Table
    {
        return UsersTable::configure($table);
    }
}
