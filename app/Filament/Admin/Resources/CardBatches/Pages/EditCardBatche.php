<?php

namespace App\Filament\Admin\Resources\CardBatches\Pages;

use App\Filament\Admin\Resources\CardBatches\CardBatcheResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCardBatche extends EditRecord
{
    protected static string $resource = CardBatcheResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
