<?php

namespace App\Filament\Admin\Resources\Clients\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ClientsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->emptyStateHeading(__('No clients found'))
            ->columns([
                TextColumn::make('firstname')
                    ->label(__('First name'))
                    ->searchable(),
                TextColumn::make('lastname')
                    ->label(__('Last name'))
                    ->searchable(),
                TextColumn::make('username')
                    ->label(__('Username'))
                    ->searchable(),
                TextColumn::make('phone')
                    ->label(__('Phone'))
                    ->searchable(),
                TextColumn::make('mobile')
                    ->label(__('Mobile'))
                    ->searchable(),
                //                TextColumn::make('company')
                //                    ->searchable(),
                TextColumn::make('address')
                    ->label(__('Address'))
                    ->searchable(),

                //                TextColumn::make('srvid')
                //                    ->numeric()
                //                    ->sortable(),
                //                TextColumn::make('expiration')
                //                    ->dateTime()
                //                    ->sortable(),
                //                TextColumn::make('uptimelimit')
                //                    ->searchable(),
                //                TextColumn::make('comment')
                //                    ->searchable(),
                //                TextColumn::make('acctype')
                //                    ->numeric()
                //                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
