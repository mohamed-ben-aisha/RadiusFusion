<?php

namespace App\Services;

use App\Models\RM\RMInvoice;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class DMARadiusService
{
    public function __construct($config)
    {
        Config::set('database.connections.dynamic_mysql', $config);

        DB::purge('dynamic_mysql');
        DB::reconnect('dynamic_mysql');
    }

    public function addCredits(array $data): RMInvoice
    {
        return RMInvoice::create([
            'invgroup' => '0',
            'invnum' => '2025-0010',
            'managername' => 'RadiusFusion',
            'username' => $data['username'],
            'service' => $data['service'],
            'date' => $data['date'],
            'comment' => $data['comment'],
            'amount' => $data['amount'],
            'price' => $data['price'],
            'bytescomb' => (int) $data['bytescomb'],
            'comblimit' => (int) $data['comblimit'],
            'days' => $data['days'],
            'expiration' => $data['expiration'],
        ]);
    }

    public function removeCredits(array $data): RMInvoice
    {
        return RMInvoice::create([
            'invgroup' => '0',
            'invnum' => '2025-0010',
            'managername' => 'RadiusFusion',
            'username' => $data['username'],
            'service' => $data['service'],
            'date' => $data['date'],
            'comment' => $data['comment'],
            'amount' => $data['amount'],
            'price' => $data['price'],
            'bytescomb' => (int) $data['bytescomb'] * -1,
            'comblimit' => (int) $data['comblimit'] * -1,
            'days' => $data['days'],
            'expiration' => $data['expiration'],
        ]);
    }
}
