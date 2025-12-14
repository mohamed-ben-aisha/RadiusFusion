<?php

namespace App\Filament\Admin\Resources\Resellers\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ResellerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Section::make(__('Reseller details'))
                    ->columns(2)
                    ->schema([
                        TextInput::make('name')
                            ->label(__('Reseller name'))
                            ->required(),
                        Select::make('branch_id')
                            ->label(__('Branch'))
                            ->relationship('branch', 'name')
                            ->required(),
                        TextInput::make('company')
                            ->label(__('Company name'))
                            ->required(),
                        TextInput::make('mobile')
                            ->label(__('Mobile'))
                            ->tel(),
                        TextInput::make('phone')
                            ->label(__('Phone'))
                            ->tel(),
                        TextInput::make('credits')
                            ->label(__('Credits'))
                            ->required()
                            ->numeric()
                            ->disabledOn('edit')
                            ->default(0),
                        TextInput::make('comment')
                            ->label(__('Comment')),
                        TextInput::make('status')
                            ->label(__('Status'))
                            ->required()
                            ->default('active'),
                    ]),
            ]);
    }
}
