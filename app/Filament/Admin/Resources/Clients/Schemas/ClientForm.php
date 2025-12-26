<?php

namespace App\Filament\Admin\Resources\Clients\Schemas;

use App\Enums\ClientTypeAccountEnum;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ClientForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Section::make(__('Account details'))
                    ->columns(2)
                    ->schema([
                        Select::make('branch_id')
                            ->label(__('Branch'))
                            ->relationship('branch', 'name')
                            ->required(),

                        Select::make('type_account')
                            ->label(__('Account type'))
                            ->options(ClientTypeAccountEnum::options())
                            ->required(),
                    ]),

                Section::make(__('Client details'))
                    ->columns(2)
                    ->schema([
                        TextInput::make('firstname')
                            ->label(__('First name'))
                            ->required(),
                        TextInput::make('lastname')
                            ->label(__('Last name'))
                            ->required(),
                        TextInput::make('username')
                            ->label(__('Username'))
                            ->required(),
                        TextInput::make('password')
                            ->label(__('Password'))
                            ->password()
                            ->required(),
                        TextInput::make('company')
                            ->label(__('Company')),
                        TextInput::make('address')
                            ->label(__('Address')),
                        TextInput::make('phone')
                            ->label(__('Phone')),
                        TextInput::make('mobile')
                            ->label(__('Mobile'))
                            ->hint(__('Used for notifications')),
                        TextInput::make('email')
                            ->label(__('Email address'))
                            ->email(),
                        TextArea::make('comment')
                            ->rows(3)
                            ->columnSpan(2)
                            ->label(__('Comment')),
                    ]),
            ]);
    }
}
