<?php

namespace App\Filament\Admin\Resources\CardBatches\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class CardBatcheForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('service_id')
                    ->required()
                    ->numeric(),
                TextInput::make('batch_code'),
                TextInput::make('total_cards')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('price_per_card')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('total_amount')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('status'),
                TextInput::make('note'),
            ]);
    }
}
