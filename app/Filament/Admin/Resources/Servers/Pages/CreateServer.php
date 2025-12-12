<?php

namespace App\Filament\Admin\Resources\Servers\Pages;

use App\Filament\Admin\Resources\Servers\ServerResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Contracts\Support\Htmlable;

class CreateServer extends CreateRecord
{
    protected static string $resource = ServerResource::class;

    public function getTitle(): string|Htmlable
    {
        return __('Create a new server');
    }

    public function getDescription(): string|Htmlable
    {
        return __('Create a new server s');
    }

    public function getHeading(): string|Htmlable
    {
        return __('Create a new server');
    }
}
