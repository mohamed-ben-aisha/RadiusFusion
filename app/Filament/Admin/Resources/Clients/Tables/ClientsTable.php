<?php

namespace App\Filament\Admin\Resources\Clients\Tables;

use App\Enums\ClientStausEnum;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

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
                    ->copyable()
                    ->searchable(),
                TextColumn::make('address')
                    ->label(__('Address'))
                    ->searchable(),
                TextColumn::make('branch.name')
                    ->label(__('Branch'))
                    ->searchable(),
                TextColumn::make('status')
                    ->label(__('Status'))
                    ->badge()
                    ->color(fn ($state) => ClientStausEnum::from($state)->color())
                    ->formatStateUsing(fn ($state) => ClientStausEnum::from($state)->label()),
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
                Filter::make('branch')
                    ->schema([
                        Select::make('branch_id')
                            ->label(__('Branch'))
                            ->relationship('branch', 'name'),
                    ])
                    ->query(function (Builder $query, array $data): void {
                        $query->when(
                            $data['branch_id'],
                            fn (Builder $query, $branch_id): Builder => $query->where('branch_id', $branch_id),
                        );
                    }),
            ])
            ->recordActions([
                EditAction::make()
                    ->label(__('Edit Client'))
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
