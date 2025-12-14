<?php

namespace Database\Seeders;

use App\Models\Server;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // RMUser::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@test.com',
        ]);

        Server::create([
            'name' => 'test',
            'description' => 'test',
            'host' => '192.168.0.71',
            'port' => '3306',
            'db_user' => 'stt',
            'db_password' => 'pass1234',
            'db_name' => 'radius',
        ]);
    }
}
