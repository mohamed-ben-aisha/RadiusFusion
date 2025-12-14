<?php

namespace App\Filament\Admin\Resources\Branches\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class BranchForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Section::make(__('Branch details'))
                    ->columns(2)
                    ->schema([
                        TextInput::make('name')
                            ->label(__('Branch name'))
                            ->required(),
                        Select::make('server_id')
                            ->label(__('Server'))
                            ->relationship('server', 'name')
                            ->required(),
                        TextInput::make('comment')
                            ->label(__('Comment')),
                    ]),
            ]);
    }
}
