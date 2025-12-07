<?php

use App\Helpers\ConverterUnitHelper;
use App\Models\RM\RMUser;
use App\Services\DMARadiusService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/test', function () {
    $config = [
        'driver' => 'mysql',
        'host' => '192.168.0.71',
        'port' => 3306,
        'database' => 'radius',
        'username' => 'stt',
        'password' => 'pass1234',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => '',
        'strict' => false,
        'engine' => null,
    ];
    //    Config::set('database.connections.dynamic_mysql', $config);
    //
    //    DB::purge('dynamic_mysql');
    //    DB::reconnect('dynamic_mysql');

    $dma = new DMARadiusService($config);
    //    $invoice = $dma->addCredits([
    //        'invgroup' => '0',
    //        'invnum' => '2025-0010',
    //        'managername' => 'RadiusFusion',
    //        'username' => 'user',
    //        'service' => 'Swift 200GB',
    //        'date' => '2025-01-01',
    //        'comment' => 'mohamed',
    //        'amount' => '1',
    //        'price' => '100',
    //        'bytescomb' => 1,
    //        'comblimit' => 1,
    //        'days' => '30',
    //        'expiration' => '2026-01-31',
    //    ]);
    //
    //    $dma->removeCredits([
    //        'invgroup' => '0',
    //        'invnum' => '2025-0010',
    //        'managername' => 'RadiusFusion',
    //        'username' => 'user',
    //        'service' => 'Swift 200GB',
    //        'date' => '2025-01-01',
    //        'comment' => 'mohamed',
    //        'amount' => '1',
    //        'price' => '100',
    //        'bytescomb' => 1,
    //        'comblimit' => 1,
    //        'days' => '30',
    //        'expiration' => '2026-01-31',
    //    ]);

    $user = RMUser::where('username', 'user')->first();

    return [
        // $invoice,
        ConverterUnitHelper::convertBitesToOtherUnit($user->service->getRawOriginal('downrate')),
    ];
});
