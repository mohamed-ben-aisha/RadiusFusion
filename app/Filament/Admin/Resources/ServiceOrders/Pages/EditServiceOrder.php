<?php

namespace App\Filament\Admin\Resources\ServiceOrders\Pages;

use App\Filament\Admin\Resources\ServiceOrders\ServiceOrderResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditServiceOrder extends EditRecord
{
    protected static string $resource = ServiceOrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
