<?php

namespace App\Filament\Admin\Resources\Servers\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class NasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->emptyStateHeading(__('No NAS found'))
            ->columns([
                TextColumn::make('nasname')
                    ->label(__('Host'))
                    ->searchable(),

                TextColumn::make('shortname')
                    ->label(__('Short name'))
                    ->searchable(),

                TextColumn::make('type')
                    ->label(__('Type'))
                    ->searchable(),

                TextColumn::make('ports')
                    ->label(__('Ports'))
                    ->searchable(),

                TextColumn::make('secret')
                    ->label(__('Secret'))
                    ->searchable(),
            ]);
    }
}
