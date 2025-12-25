<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\Reseller;
use App\Models\Server;
use Illuminate\Database\Seeder;

class DataSeeder extends Seeder
{
    public function run()
    {
        $server = Server::create([
            'name' => 'test',
            'description' => 'test',
            'host' => '192.168.0.71',
            'port' => '3306',
            'db_user' => 'stt',
            'db_password' => 'pass1234',
            'db_name' => 'radius',
        ]);

        $branch = Branch::create([
            'name' => 'Branch 1',
            'server_id' => $server->id,
            'comment' => 'test',
        ]);

        Reseller::create([
            'name' => 'Reseller 1',
            'branch_id' => $branch->id,
            'company' => 'test',
            'mobile' => '0911234567',
            'phone' => '0921234567',
            'credits' => 1000,
            'comment' => 'test',
            'status' => 'active',
        ]);
    }
}
