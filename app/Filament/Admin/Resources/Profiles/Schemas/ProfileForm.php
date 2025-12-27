<?php

namespace App\Filament\Admin\Resources\Profiles\Schemas;

use App\Models\Profile;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
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
                        Grid::make()
                            ->columns(3)
                            ->columnSpan(2)
                            ->schema([
                                Toggle::make('enableservice')
                                    ->label(__('Enable service'))
                                    ->default(true),
                                Toggle::make('availucp')
                                    ->label(__('Available in UCP'))
                                    ->default(true),
                            ]),
                        TextInput::make('name')
                            ->label(__('Profile name'))
                            ->required(),
                        TextInput::make('description')
                            ->label(__('Description')),
                    ]),

                Tabs::make()
                    ->tabs([
                        Tab::make(__('Rate'))
                            ->schema([
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

                                Fieldset::make(__('Limitations'))
                                    ->columns(2)
                                    ->columnSpan(2)
                                    ->schema([
                                        Toggle::make('limitdl')
                                            ->label(__('Limit download'))
                                            ->required(),
                                        Toggle::make('limitul')
                                            ->label(__('Limit upload'))
                                            ->required(),
                                        Toggle::make('limitexpiration')
                                            ->label(__('Limit expire'))
                                            ->required(),
                                        Toggle::make('limituptime')
                                            ->label(__('Limit uptime'))
                                            ->required(),
                                    ]),

                            ]),

                        Tab::make(__('Quota'))
                            ->schema([
                                Fieldset::make(__('Quota'))
                                    ->columns(2)
                                    ->columnSpan(2)
                                    ->schema([
                                        TextInput::make('trafficunitdl')
                                            ->label(__('Traffic unit download'))
                                            ->required()
                                            ->numeric()
                                            ->minValue(0)
                                            ->default(0),
                                        TextInput::make('trafficunitul')
                                            ->label(__('Traffic unit upload'))
                                            ->required()
                                            ->numeric()
                                            ->minValue(0)
                                            ->default(0),
                                        TextInput::make('trafficunitcomb')
                                            ->label(__('Traffic unit combined'))
                                            ->required()
                                            ->numeric()
                                            ->minValue(0)
                                            ->default(0),
                                    ]),
                            ]),

                        Tab::make(__('Daily Quota'))
                            ->schema([
                                Fieldset::make(__('Quota'))
                                    ->columns(2)
                                    ->columnSpan(2)
                                    ->schema([
                                        TextInput::make('dlquota')
                                            ->label(__('Download quota'))
                                            ->required()
                                            ->numeric()
                                            ->suffix('GB')
                                            ->minValue(0)
                                            ->default(0),
                                        TextInput::make('ulquota')
                                            ->label(__('Upload quota'))
                                            ->required()
                                            ->numeric()
                                            ->suffix('GB')
                                            ->minValue(0)
                                            ->default(0),
                                        TextInput::make('combquota')
                                            ->label(__('Combined quota'))
                                            ->required()
                                            ->numeric()
                                            ->suffix('GB')
                                            ->minValue(0)
                                            ->default(0),
                                        TextInput::make('timequota')
                                            ->label(__('Time quota'))
                                            ->required()
                                            ->numeric()
                                            ->suffix('Hours')
                                            ->minValue(0)
                                            ->default(0),
                                    ]),
                            ]),

                        Tab::make(__('Pricing'))
                            ->schema([
                                Fieldset::make(__('Pricing'))
                                    ->columns(2)
                                    ->columnSpan(2)
                                    ->schema([
                                        Grid::make()
                                            ->columns(3)
                                            ->columnSpan(2)
                                            ->schema([
                                                Toggle::make('monthly')
                                                    ->label(__('Monthly'))
                                                    ->required(),
                                                Toggle::make('renew')
                                                    ->label(__('Auto renew'))
                                                    ->required(),
                                                Toggle::make('carryover')
                                                    ->label(__('Auto renew'))
                                                    ->required(),
                                            ]),
                                        TextInput::make('unitprice')
                                            ->label(__('Unit price'))
                                            ->required()
                                            ->numeric()
                                            ->minValue(0)
                                            ->default(0),
                                    ]),
                            ]),

                        Tab::make(__('Advanced'))
                            ->schema([
                                Fieldset::make(__('Advanced'))
                                    ->columns(2)
                                    ->columnSpan(2)
                                    ->schema([
                                        Select::make('nextsrvid')
                                            ->label(__('Next service'))
                                            ->options(Profile::all()->pluck('name', 'id')->toArray()),
                                            //->relationship('nextservice', 'name'),

                                        Select::make('dailynextsrvid')
                                            ->label(__('Daily next service'))
                                            ->options(['-1' => 'None']),
                                            //->relationship('dailynextservice', 'name'),

                                        Select::make('disnextsrvid')
                                            ->label(__('Disconnect next service'))
                                            ->options(['-1' => 'None']),
                                            //->relationship('disnextservice', 'name'),

                                        TextInput::make('poolname')
                                            ->label(__('Pool name')),

                                        TextInput::make('custattr')
                                            ->label(__('Custom RADIUS attribute')),
                                    ]),
                            ]),
                    ]),
            ]);
    }
}
