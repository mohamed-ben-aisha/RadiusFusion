<?php

namespace App\Filament\Admin\Resources\Branches\Tables;

use App\Filament\Admin\Resources\Branches\Schemas\CreditForm;
use Filament\Actions\Action;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class BranchesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label(__('Branch name'))
                    ->searchable(),
                TextColumn::make('server.name')
                    ->label(__('Server'))
                    ->searchable(),
                TextColumn::make('resellers_count')
                    ->label(__('Resellers'))
                    ->counts('resellers')
                    ->sortable(),
                TextColumn::make('credits')
                    ->label(__('Credits'))
                    ->sortable(),
                TextColumn::make('comment')
                    ->label(__('Comment'))
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
                    ->label(__('Branch details'))
                    ->hiddenLabel()
                    ->icon('heroicon-o-pencil')
                    ->hiddenLabel()
                    ->tooltip(__('Edit')),

                Action::make('deposit_credits')
                    ->label(__('Deposit Credits'))
                    ->icon('heroicon-o-plus')
                    ->hiddenLabel()
                    ->tooltip(__('Deposit Credits'))
                    ->modalWidth('md')
                    ->schema(CreditForm::configure())
                    ->action(fn (array $data, $record) => CreditForm::action($data, $record, 'deposit')),
                Action::make('withdraw_credits')
                    ->label(__('Withdraw Credits'))
                    ->icon('heroicon-o-minus')
                    ->hiddenLabel()
                    ->tooltip(__('Withdraw Credits'))
                    ->modalWidth('md')
                    ->schema(CreditForm::configure())
                    ->action(fn (array $data, $record) => CreditForm::action($data, $record, 'withdraw')),
            ])
            ->toolbarActions([
                DeleteBulkAction::make(),
            ]);
    }
}
