<?php

use App\Models\RM\RMInvoice;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $config = [
        'driver'    => 'mysql',
        'host'      => '192.168.0.71',
        'port'      => 3306,
        'database'  => 'radius',
        'username'  => 'stt',
        'password'  => 'pass1234',
        'charset'   => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix'    => '',
        'strict'    => false,
        'engine'    => null,
    ];
    Config::set('database.connections.dynamic_mysql', $config);

    DB::purge('dynamic_mysql');
    DB::reconnect('dynamic_mysql');

    RMInvoice::insert([
        'invgroup' => '0',
        'invnum' => '2025-0003',
        'managername' => 'admin',
        'username' => 'user',
        'service' => 'DMA Portal',
        'date' => '2025-01-01',
    ]);

    RMInvoice::insert([
        'invgroup' => '1',
        'managername' => 'admin',
        'username' => 'admin',
        'service' => 'DMA Portal',
        'date' => '2025-01-01',
    ]);

    $invoice = RMInvoice::where('invnum', '2025-0003')->first();

    return [
        $invoice,
    ];
});
