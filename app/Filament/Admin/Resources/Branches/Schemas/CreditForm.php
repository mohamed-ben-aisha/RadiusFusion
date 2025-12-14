<?php

namespace App\Filament\Admin\Resources\Branches\Schemas;

use App\Models\Invoice;
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
                        ->default(0)
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

        Invoice::create([
            'number' => '2025-0001',
            'user_id' => auth()->user()->id,
            'reseller_id' => $record->id,
            'type' => 'reseller',
            'service' => 'deposit',
            'comment' => $data['comment'],
            'amount' => $data['amount'],
            'price' => $data['amount'],
            'paid' => $data['amount'],
            'status' => 'paid',
        ]);

        Invoice::create([
            'number' => '2025-0001',
            'user_id' => $record->id,
            'type' => 'reseller',
            'service' => 'withdraw',
            'comment' => $data['comment'],
            'amount' => $data['amount'] * -1,
            'price' => $data['amount'] * -1,
            'paid' => $data['amount'] * -1,
            'status' => 'paid',
        ]);
    }
}
