<?php

namespace App\Filament\Admin\Resources\Resellers\Tables;

use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TransactionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->emptyStateHeading(__('No transactions found'))
            ->columns([
                TextColumn::make('number')
                    ->label(__('Transaction number'))
                    ->searchable(),
                TextColumn::make('branch.name')
                    ->label(__('Branch'))
                    ->searchable(),
                TextColumn::make('type')
                    ->label(__('Transaction type'))
                    ->searchable(),
                TextColumn::make('service')
                    ->label(__('Service'))
                    ->searchable(),
                TextColumn::make('comment')
                    ->label(__('Comment'))
                    ->searchable(),
                TextColumn::make('amount')
                    ->label(__('Amount'))
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
                //
            ])
            ->toolbarActions([
                DeleteBulkAction::make(),
            ]);
    }
}
