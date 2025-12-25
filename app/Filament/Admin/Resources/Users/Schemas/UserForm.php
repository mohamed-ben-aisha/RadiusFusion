<?php

namespace App\Filament\Admin\Resources\Users\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Section::make(__('User details'))
                    ->columns(2)
                    ->schema([
                        TextInput::make('name')
                            ->label(__('Name'))
                            ->required(),
                        TextInput::make('username')
                            ->label(__('Username'))
                            ->required(),

                        TextInput::make('password')
                            ->label(__('Password'))
                            ->password()
                            ->revealable()
                            ->required(),
                        TextInput::make('password_confirmation')
                            ->label(__('Password confirmation'))
                            ->password()
                            ->revealable()
                            ->same('password')
                            ->required(),
                        TextInput::make('email')
                            ->label('Email address')
                            ->label(__('Email address'))
                            ->email()
                            ->required(),
                        TextInput::make('credits')
                            ->label(__('Credits'))
                            ->numeric()
                            ->disabled(fn ($state, $livewire) => $livewire->record->exists)
                            ->default(0),
                    ]),
            ]);
    }
}
