<?php

namespace App\Filament\Admin\Resources\Clients\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ClientForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('firstname'),
                TextInput::make('lastname'),
                TextInput::make('username')
                    ->required(),
                TextInput::make('password')
                    ->password()
                    ->required(),
                TextInput::make('company'),
                TextInput::make('address'),
                TextInput::make('email')
                    ->label('Email address')
                    ->email(),
                TextInput::make('phone')
                    ->tel(),
                TextInput::make('mobile'),
                TextInput::make('srvid')
                    ->required()
                    ->numeric(),
                DateTimePicker::make('expiration')
                    ->required(),
                TextInput::make('uptimelimit')
                    ->required(),
                TextInput::make('comment'),
                TextInput::make('acctype')
                    ->required()
                    ->numeric(),
            ]);
    }
}
