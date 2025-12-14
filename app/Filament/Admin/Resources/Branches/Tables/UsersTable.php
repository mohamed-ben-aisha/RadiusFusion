<?php

namespace App\Filament\Admin\Resources\Branches\Tables;

use Filament\Actions\AttachAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DetachAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label(__('User name'))
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
            ->headerActions([
                AttachAction::make('user_attach')
                    ->label(__('Attach User'))
                    ->icon('heroicon-o-plus')
                    ->hiddenLabel()
                    ->tooltip(__('Attach User')),
            ])
            ->recordActions([
                DetachAction::make('user_detach')
                    ->label(__('Detach User'))
                    ->icon('heroicon-o-minus')
                    ->hiddenLabel()
                    ->tooltip(__('Detach User')),
            ])
            ->toolbarActions([
                DeleteBulkAction::make(),
            ]);
    }
}
