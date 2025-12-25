<?php

namespace App\Filament\Admin\Resources\Branches\Tables;

use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DetachAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->emptyStateHeading(__('No users found'))
            ->columns([
                TextColumn::make('name')
                    ->label(__('Name'))
                    ->searchable(),
                TextColumn::make('username')
                    ->label(__('Username'))
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
                DetachAction::make('detach_user')
                    ->label(__('Detach User'))
                    ->icon('heroicon-o-trash')
                    ->hiddenLabel()
                    ->tooltip(__('Detach User')),
            ])
            ->toolbarActions([
                DeleteBulkAction::make(),
            ]);
    }
}
