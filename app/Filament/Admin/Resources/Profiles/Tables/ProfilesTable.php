<?php

namespace App\Filament\Admin\Resources\Profiles\Tables;

use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProfilesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->emptyStateHeading(__('No profiles found'))
            ->columns([
                TextColumn::make('name')
                    ->label(__('Profile name'))
                    ->searchable(),
                TextColumn::make('downrate')
                    ->label(__('Downrate'))
                    ->sortable(),
                TextColumn::make('uprate')
                    ->label(__('Uprate'))
                    ->sortable(),
                TextColumn::make('unitprice')
                    ->label(__('Unit price')),
                IconColumn::make('limitdl')
                    ->label(__('Limit download'))
                    ->boolean(),
                IconColumn::make('limitul')
                    ->label(__('Limit upload'))
                    ->boolean(),
                IconColumn::make('limitexpiration')
                    ->label(__('Limit expire'))
                    ->boolean(),
                IconColumn::make('limituptime')
                    ->label(__('Limit uptime'))
                    ->boolean(),
                TextColumn::make('created_at')
                    ->label(__('Created at'))
                    ->dateTime('Y-m-d H:i:s')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label(__('Updated at'))
                    ->dateTime('Y-m-d H:i:s')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make()
                    ->label(__('Edit Profile'))
                    ->hiddenLabel()
                    ->icon('heroicon-o-pencil')
                    ->hiddenLabel()
                    ->tooltip(__('Edit')),
            ])
            ->toolbarActions([
                // DeleteBulkAction::make(),
            ]);
    }
}
