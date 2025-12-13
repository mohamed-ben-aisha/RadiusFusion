<?php

namespace App\Filament\Admin\Resources\Servers\Tables;

use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ServiceTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->emptyStateHeading(__('No services found'))
            ->columns([
                TextColumn::make('srvname')
                    ->label(__('Service name'))
                    ->searchable(),
                TextColumn::make('descr')
                    ->label(__('Description')),
                TextColumn::make('downrate')
                    ->label(__('Downrate').' (Mbps)'),
                TextColumn::make('uprate')
                    ->label(__('Uprate').' (Mbps)'),
                TextColumn::make('unitprice')
                    ->label(__('Unit price'))
                    ->formatStateUsing(fn ($state) => number_format($state, 2)),
            ]);
    }
}
