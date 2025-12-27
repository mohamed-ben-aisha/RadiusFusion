<?php

namespace App\Filament\Admin\Resources\Clients\Pages;

use App\Filament\Admin\Resources\Clients\ClientResource;
use App\Models\Client;
use App\Services\DMARadius;
use Filament\Resources\Pages\CreateRecord;

class CreateClient extends CreateRecord
{
    protected static string $resource = ClientResource::class;

    public function getTitle(): string
    {
        return __('Create Client');
    }

    protected function afterCreate(): void
    {
        /** @var Client $client */
        $client = $this->record;
        $branch = $client->branch;

        $config = [
            'driver' => 'mysql',
            'host' => $branch->server->host,
            'port' => $branch->server->port,
            'database' => $branch->server->db_name,
            'username' => $branch->server->db_user,
            'password' => $branch->server->db_password,
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => false,
            'engine' => null,
        ];

        $DMAService = new DMARadius($config);
        $DMAService->createClient($client);
    }
}
