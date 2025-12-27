<?php

namespace App\Filament\Admin\Resources\ServiceOrders\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ServiceOrderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Section::make()
                    ->columns(2)
                    ->schema([
                        Select::make('client_id')
                            ->label(__('Client'))
                            ->relationship('client', 'id')
                            ->searchable()
                            ->required(),
                        Select::make('branch_id')
                            ->label(__('Branch'))
                            ->relationship('branch', 'name'),
                        Select::make('reseller_id')
                            ->label(__('Reseller'))
                            ->relationship('reseller', 'name'),
                        TextInput::make('type')
                            ->label(__('Service order type'))
                            ->required(),
                        TextInput::make('status')
                            ->required()
                            ->default('open'),
                        TextInput::make('number'),
                        TextInput::make('priority')
                            ->required()
                            ->default('medium'),
                        //                TextInput::make('category'),
                        //                TextInput::make('issue_description'),
                        //                TextInput::make('reported_problem'),
                        //                TextInput::make('signal'),
                        //                TextInput::make('assigned_technician'),
                        //                DateTimePicker::make('assigned_at'),
                        //                DateTimePicker::make('started_at'),
                        //                DateTimePicker::make('resolved_at'),
                        //                DateTimePicker::make('closed_at'),
                    ]),
            ]);
    }
}
