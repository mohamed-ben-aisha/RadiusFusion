<?php

namespace App\Filament\Admin\Resources\Branches\Pages;

use App\Filament\Admin\Resources\Branches\BranchResource;
use App\Filament\Admin\Resources\Branches\Schemas\ResellerForm;
use App\Filament\Admin\Resources\Branches\Tables\ResellesTable;
use Filament\Resources\Pages\ManageRelatedRecords;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class ManageReseller extends ManageRelatedRecords
{
    protected static string $resource = BranchResource::class;

    protected static string $relationship = 'resellers';

    public static function getNavigationLabel(): string
    {
        return __('Resellers');
    }

    public function getTitle(): string
    {
        return __('Resellers').' - '.$this->getOwnerRecord()->name;
    }

    public function table(Table $table): Table
    {
        return ResellesTable::configure($table);
    }

    public function form(Schema $schema): Schema
    {
        return ResellerForm::configure($schema);
    }
}
