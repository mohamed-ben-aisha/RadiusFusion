<?php

namespace App\Filament\Admin\Resources\Branches\Pages;

use App\Filament\Admin\Resources\Branches\BranchResource;
use App\Filament\Admin\Resources\Branches\Schemas\ResellerForm;
use App\Filament\Admin\Resources\Branches\Tables\ResellesTable;
use Filament\Actions\CreateAction;
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
        return __('Resellers');
    }

    public function table(Table $table): Table
    {
        return ResellesTable::configure($table)
            ->filters([
                //
            ])
            ->headerActions([
                CreateAction::make('reseller_create')
                    ->label(__('Create Reseller'))
                    ->icon('heroicon-o-plus')
                    ->hiddenLabel()
                    ->tooltip(__('Create Reseller')),
            ]);
    }

    public function form(Schema $schema): Schema
    {
        return ResellerForm::configure($schema);
    }
}
