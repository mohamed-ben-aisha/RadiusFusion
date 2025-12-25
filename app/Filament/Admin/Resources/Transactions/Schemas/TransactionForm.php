<?php

namespace App\Filament\Admin\Resources\Transactions\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TransactionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('number'),
                TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                TextInput::make('reseller_id')
                    ->numeric(),
                TextInput::make('branch_id')
                    ->numeric(),
                Select::make('client_id')
                    ->relationship('client', 'id'),
                TextInput::make('type')
                    ->required()
                    ->default('client'),
                TextInput::make('service'),
                TextInput::make('comment'),
                TextInput::make('amount')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->default(0)
                    ->prefix('$'),
                TextInput::make('paid')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('status'),
            ]);
    }
}
