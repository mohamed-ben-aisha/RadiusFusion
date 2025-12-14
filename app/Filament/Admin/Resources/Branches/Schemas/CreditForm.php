<?php

namespace App\Filament\Admin\Resources\Branches\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;

class CreditForm
{
    public static function configure(): array
    {
        return [
            Grid::make()
                ->columns(1)
                ->schema([
                    TextInput::make('amount')
                        ->label(__('Amount'))
                        ->numeric()
                        ->required(),
                    TextInput::make('comment')
                        ->label(__('Comment')),
                ]),
        ];
    }

    public static function action($data, $record, $type): void
    {
        if ($type === 'deposit') {
            $record->update(['credits' => $record->credits + $data['amount']]);
        } else {
            $record->update(['credits' => $record->credits - $data['amount']]);
        }
    }
}
