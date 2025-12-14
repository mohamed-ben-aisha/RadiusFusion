<?php

namespace App\Filament\Admin\Resources\Users\Tables;

use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label(__('Name'))
                    ->searchable(),
                TextColumn::make('username')
                    ->label(__('Username'))
                    ->searchable(),
                TextColumn::make('email')
                    ->label(__('Email address'))
                    ->searchable(),
                TextColumn::make('credits')
                    ->label(__('Credits'))
                    ->sortable(),
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
                EditAction::make()
                    ->label(__('Edit User'))
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
