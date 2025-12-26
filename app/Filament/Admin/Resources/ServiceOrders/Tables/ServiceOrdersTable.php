<?php

namespace App\Filament\Admin\Resources\ServiceOrders\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ServiceOrdersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('number')
                    ->label(__('Number #'))
                    ->searchable(),
                TextColumn::make('client.name')
                    ->label(__('Client'))
                    ->searchable(),
                TextColumn::make('branch.name')
                    ->label(__('Branch'))
                    ->searchable(),
                TextColumn::make('type')
                    ->label(__('Service order type'))
                    ->searchable(),
                TextColumn::make('status')
                    ->label(__('Status'))
                    ->searchable(),
                //                TextColumn::make('priority')
                //                    ->searchable(),
                //                TextColumn::make('category')
                //                    ->searchable(),
                //                TextColumn::make('issue_description')
                //                    ->searchable(),
                //                TextColumn::make('reported_problem')
                //                    ->searchable(),
                //                TextColumn::make('signal')
                //                    ->searchable(),
                //                TextColumn::make('assigned_technician')
                //                    ->searchable(),
                TextColumn::make('assigned_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('started_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('resolved_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('closed_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
