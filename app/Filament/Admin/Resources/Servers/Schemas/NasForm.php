<?php

namespace App\Filament\Admin\Resources\Servers\Schemas;

use App\Models\RM\RMNas;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;

class NasForm
{
    public static function configure(?RMNas $record = null): array
    {
        return [
            Grid::make(3)
                ->schema([
                    TextInput::make('nasname')
                        ->label(__('Host'))
                        ->default($record?->nasname)
                        ->required(),
                    TextInput::make('shortname')
                        ->label(__('Short name'))
                        ->default($record?->shortname),
                    TextInput::make('type')
                        ->label(__('Type'))
                        ->default($record?->type)
                        ->required(),
                    TextInput::make('ports')
                        ->label(__('Port'))
                        ->default($record?->ports)
                        ->required(),
                    TextInput::make('secret')
                        ->label(__('Secret'))
                        ->default($record?->secret)
                        ->required(),
                    TextInput::make('community')
                        ->label(__('Community'))
                        ->default($record?->community)
                        ->required(),
                    TextInput::make('description')
                        ->label(__('Description'))
                        ->default($record?->description)
                        ->required(),
                    TextInput::make('starospassword')
                        ->label(__('StarOS password'))
                        ->default($record?->starospassword)
                        ->required(),
                    TextInput::make('ciscobwmode')
                        ->label(__('Cisco BW mode'))
                        ->default($record?->ciscobwmode)
                        ->required(),
                    TextInput::make('apiusername')
                        ->label(__('API username'))
                        ->default($record?->apiusername)
                        ->required(),
                    TextInput::make('apipassword')
                        ->label(__('API password'))
                        ->default($record?->apipassword)
                        ->required(),
                    TextInput::make('apiver')
                        ->label(__('API version'))
                        ->default($record?->apiver)
                        ->required(),
                    TextInput::make('coamode')
                        ->label(__('CoA mode'))
                        ->default($record?->coamode)
                        ->required(),
                    TextInput::make('dhcp')
                        ->label(__('DHCP'))
                        ->default($record?->dhcp)
                        ->required(),
                ]),
        ];
    }
}
