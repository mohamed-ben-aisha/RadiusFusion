<?php

namespace App\Filament\Admin\Resources\Branches\Pages;

use App\Filament\Admin\Resources\Branches\BranchResource;
use App\Filament\Admin\Resources\Branches\Tables\UsersTable;
use App\Models\User;
use Filament\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ManageRelatedRecords;
use Filament\Tables\Table;

class ManageUsers extends ManageRelatedRecords
{
    protected static string $resource = BranchResource::class;

    protected static string $relationship = 'users';

    public static function getNavigationLabel(): string
    {
        return __('Users');
    }

    public function getTitle(): string
    {
        return __('Users').' - '.$this->getOwnerRecord()->name;
    }

    public function table(Table $table): Table
    {
        return UsersTable::configure($table)
            ->headerActions([
                Action::make('user_attach')
                    ->label(__('Attach User'))
                    ->icon('heroicon-o-plus')
                    ->hiddenLabel()
                    ->tooltip(__('Attach User'))
                    ->modalWidth('md')
                    ->schema([
                        Select::make('user_id')
                            ->label(__('User'))
                            ->options(User::pluck('name', 'id'))
                            ->searchable()
                            ->required(),
                    ])
                    ->action(function (array $data) {
                        try {
                            $user = User::find($data['user_id']);
                            if ($this->getOwnerRecord()->users->contains($user)) {
                                throw new \Exception(__('User already attached'));
                            }
                            $this->getOwnerRecord()->users()->attach($user);

                            Notification::make()
                                ->title(__('User attached'))
                                ->success()
                                ->send();
                        } catch (\Exception $e) {
                            Notification::make()
                                ->title(__('User already attached'))
                                ->danger()
                                ->send();
                        }
                    }),
            ]);
    }
}
