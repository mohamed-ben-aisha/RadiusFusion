<?php

namespace App\Filament\Admin\Resources\Clients\Pages;

use App\Filament\Admin\Resources\Clients\ClientResource;
use Filament\Actions\Action;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Contracts\Support\Htmlable;
use Log;

class EditClient extends EditRecord
{
    protected static string $resource = ClientResource::class;

    public function getTitle(): string|Htmlable
    {
        return __('Edit Client').' - '.$this->record->username;
    }

    public function getSubheading(): string
    {
        return __('this account is :status', ['status' => __($this->record->status)]);
    }

    protected function getHeaderActions(): array
    {

        return [
            Action::make('disable_account')
                ->label(__('Disable Account'))
                ->icon('heroicon-o-lock-closed')
                ->hiddenLabel()
                ->hidden(fn ($record) => $record->status === 'inactive')
                ->tooltip(__('Disable Account'))
                ->action(function () {
                    $this->record->update(['status' => 'inactive']);

                    Log::info('Account disabled', ['user' => $this->record->username]);
                }),
            Action::make('activate_account')
                ->label(__('Activate Account'))
                ->icon('heroicon-o-lock-open')
                ->color('success')
                ->hiddenLabel()
                ->hidden(fn ($record) => $record->status === 'active')
                ->tooltip(__('Activate Account'))
                ->action(function () {
                    $this->record->update(['status' => 'active']);
                }),
            DeleteAction::make(),
        ];
    }
}
