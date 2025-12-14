<?php

namespace App\Filament\Admin\Resources\Branches\Pages;

use App\Filament\Admin\Resources\Branches\BranchResource;
use App\Filament\Admin\Resources\Resellers\Tables\TransactionsTable;
use Filament\Resources\Pages\ManageRelatedRecords;
use Filament\Tables\Table;

class ManageTransactions extends ManageRelatedRecords
{
    protected static string $resource = BranchResource::class;

    protected static string $relationship = 'transactions';

    public static function getNavigationLabel(): string
    {
        return __('Transactions');
    }

    public function getTitle(): string
    {
        return __('Transactions').' - '.$this->getOwnerRecord()->name;
    }

    public static function getPluralModelLabel(): string
    {
        return __('Transactions');
    }

    public function table(Table $table): Table
    {
        return TransactionsTable::configure($table);
    }
}
