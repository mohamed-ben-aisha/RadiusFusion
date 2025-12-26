<?php

namespace App\Filament\Admin\Resources\Profiles\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ProfileForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Section::make(__('Profile details'))
                    ->columns(2)
                    ->schema([
                        TextInput::make('name')
                            ->label(__('Profile name'))
                            ->required(),
                        TextInput::make('description')
                            ->label(__('Description')),
                        TextInput::make('unitprice')
                            ->label(__('Unit price'))
                            ->required()
                            ->numeric()
                            ->default(0),
                        Fieldset::make(__('Rate'))
                            ->columns(2)
                            ->columnSpan(2)
                            ->schema([
                                TextInput::make('downrate')
                                    ->label(__('Downrate'))
                                    ->required()
                                    ->numeric()
                                    ->suffix('Mbps')
                                    ->minValue(0)
                                    ->default(0),
                                TextInput::make('uprate')
                                    ->label(__('Uprate'))
                                    ->required()
                                    ->numeric()
                                    ->suffix('Mbps')
                                    ->minValue(0)
                                    ->default(0),
                            ]),
                        Toggle::make('limitdownload')
                            ->label(__('Limit download'))
                            ->required(),
                        Toggle::make('limitupload')
                            ->label(__('Limit upload'))
                            ->required(),
                        Toggle::make('limitexpire')
                            ->label(__('Limit expire'))
                            ->required(),
                        Toggle::make('limituptime')
                            ->label(__('Limit uptime'))
                            ->required(),
                    ]),
            ]);
    }
}
