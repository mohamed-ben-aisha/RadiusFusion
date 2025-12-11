<?php

namespace App\Filament\Admin\Resources\Servers\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ServerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Section::make(__('Server details'))
                    ->columns(2)
                    ->schema([
                        TextInput::make('name')
                            ->label(__('Server name'))
                            ->required(),
                        TextInput::make('description')
                            ->label(__('Description')),
                        TextInput::make('host')
                            ->label(__('Host'))
                            ->required(),
                        TextInput::make('port')
                            ->label(__('Port'))
                            ->required(),
                        TextInput::make('user')
                            ->label(__('User DB'))
                            ->required(),
                        TextInput::make('password')
                            ->label(__('Password DB'))
                            ->password()
                            ->required(),
                        TextInput::make('db_name')
                            ->label(__('Database name'))
                            ->required(),
                    ]),
            ]);
    }
}
