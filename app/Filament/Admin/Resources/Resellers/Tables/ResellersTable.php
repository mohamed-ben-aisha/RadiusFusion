<?php

namespace App\Filament\Admin\Resources\Resellers\Tables;

use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ResellersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label(__('Reseller name'))
                    ->searchable(),
                TextColumn::make('branch.name')
                    ->label(__('Branch'))
                    ->searchable(),
                TextColumn::make('company')
                    ->label(__('Company name'))
                    ->searchable(),
                TextColumn::make('mobile')
                    ->label(__('Mobile'))
                    ->searchable(),
                TextColumn::make('phone')
                    ->label(__('Phone'))
                    ->searchable(),
                TextColumn::make('credits')
                    ->label(__('Credits'))
                    ->sortable(),
                TextColumn::make('status')
                    ->label(__('Status'))
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label(__('Created at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label(__('Updated at'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make()
                    ->label(__('Edit Reseller'))
                    ->hiddenLabel()
                    ->icon('heroicon-o-pencil')
                    ->hiddenLabel()
                    ->tooltip(__('Edit')),
            ])
            ->toolbarActions([
                DeleteBulkAction::make(),
            ]);
    }
}
