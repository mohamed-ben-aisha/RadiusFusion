<?php

namespace App\Filament\Admin\Resources\Resellers\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ResellerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                Select::make('branch_id')
                    ->relationship('branch', 'name')
                    ->required(),
                TextInput::make('company'),
                TextInput::make('mobile'),
                TextInput::make('phone')
                    ->tel(),
                TextInput::make('credits')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('comment'),
                TextInput::make('status')
                    ->required()
                    ->default('active'),
            ]);
    }
}
