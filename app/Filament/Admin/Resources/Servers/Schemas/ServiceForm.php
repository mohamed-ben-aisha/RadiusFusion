<?php

namespace App\Filament\Admin\Resources\Servers\Schemas;

use App\Models\RM\RMService;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;

class ServiceForm
{
    public static function configure(?RMService $record = null): array
    {
        return [
            Grid::make(3)
                ->schema([
                    TextInput::make('srvname')
                        ->label(__('Service name'))
                        ->default($record?->srvname)
                        ->required(),
                    TextInput::make('descr')
                        ->label(__('Description'))
                        ->default($record?->descr),
                    TextInput::make('downrate')
                        ->label(__('Downrate'))
                        ->default($record?->downrate)
                        ->required(),
                    TextInput::make('uprate')
                        ->label(__('Uprate'))
                        ->default($record?->ports)
                        ->required(),
                    TextInput::make('limitcomb')
                        ->label(__('Limit comb'))
                        ->default($record?->limitcomb)
                        ->required(),
                    TextInput::make('unitprice')
                        ->label(__('Unit price'))
                        ->default($record?->unitprice)
                        ->required(),
                ]),
        ];
    }
}
