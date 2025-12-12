<?php

namespace App\Filament\Admin\Resources\Servers\Pages;

use App\Filament\Admin\Resources\Servers\Schemas\NasForm;
use App\Filament\Admin\Resources\Servers\ServerResource;
use App\Models\RM\RMNas;
use App\Models\Server;
use Config;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\Concerns\InteractsWithRecord;
use Filament\Resources\Pages\Page;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Support\Facades\DB;
use PDO;

class ManageNas extends Page implements HasTable
{
    use InteractsWithRecord;
    use InteractsWithTable;

    protected static string $resource = ServerResource::class;

    protected string $view = 'filament.admin.resources.servers.pages.manage-nas';

    public bool $connectionFailed = false;

    public static function getNavigationLabel(): string
    {
        return __('List NAS');
    }

    public function mount(int|string $record): void
    {
        $this->record = $this->resolveRecord($record);

        try {
            $this->getConnectionConfig();

            DB::connection('dynamic_mysql')->select('SELECT 1');
        } catch (\Throwable $e) {
            $this->connectionFailed = true;

            Notification::make()
                ->title(__('Connection failed'))
                ->body(__('Connection failed to the server. Please check the server credentials.'))
                ->danger()
                ->send();
        }
    }

    protected function table(Table $table): Table
    {
        return $table
            ->query(fn ($query) => $this->getTableQuery())
            ->columns([
                TextColumn::make('nasname')
                    ->label(__('Host'))
                    ->searchable(),

                TextColumn::make('shortname')
                    ->label(__('Short name'))
                    ->searchable(),

                TextColumn::make('type')
                    ->label(__('Type'))
                    ->searchable(),

                TextColumn::make('ports')
                    ->label(__('Ports'))
                    ->searchable(),

                TextColumn::make('secret')
                    ->label(__('Secret'))
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Action::make('nas_create')
                    ->label(__('Create NAS'))
                    ->icon('heroicon-o-plus')
                    ->hiddenLabel()
                    ->tooltip(__('Create NAS'))
                    ->schema(NasForm::configure())
                    ->action(function (array $data) {
                        $this->actionNas($data);
                    }),
            ])
            ->recordActions([
                Action::make('nas_edit')
                    ->label(__('Edit NAS'))
                    ->icon('heroicon-o-pencil')
                    ->hiddenLabel()
                    ->tooltip(__('Edit'))
                    ->schema(fn ($record) => NasForm::configure($record))
                    ->action(function (array $data, $record) {
                        $this->actionNas($data, $record);
                    }),
            ])
            ->toolbarActions([
                //
            ]);
    }

    public function getTableQuery(): \Illuminate\Database\Eloquent\Builder
    {
        $this->getConnectionConfig();

        return RMNas::query();
    }

    private function getConnectionConfig(): void
    {
        $server = Server::find($this->record->id);

        $config = [
            'driver' => 'mysql',
            'host' => $server->host,
            'port' => $server->port,
            'database' => $server->db_name,
            'username' => $server->db_user,
            'password' => $server->db_password,
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => false,
            'engine' => null,

            'options' => [
                PDO::ATTR_TIMEOUT => 3,
            ],
        ];

        Config::set('database.connections.dynamic_mysql', $config);

        DB::purge('dynamic_mysql');
        DB::reconnect('dynamic_mysql');
    }

    public function actionNas(array $data, $record = null): void
    {
        $this->getConnectionConfig();

        if ($record === null) {
            RMNas::create($data);
        } else {
            $nas = RMNas::find($record->id);
            $nas->update($data);
            $nas->save();
        }
    }
}
