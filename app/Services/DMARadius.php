<?php

namespace App\Services;

use App\Models\Client;
use App\Models\RM\RMInvoice;
use App\Models\RM\RMUser;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class DMARadius
{
    public function __construct($config)
    {
        Config::set('database.connections.dynamic_mysql', $config);

        DB::purge('dynamic_mysql');
        DB::reconnect('dynamic_mysql');
    }

    /**
     * create a new client in radius manager
     */
    public function createClient(Client $client): void
    {
        RMUser::create([
            'username' => $client->username,
            'password' => $client->password,
            'firstname' => $client->firstname ?? '',
            'lastname' => $client->lastname ?? '',
            'company' => $client->company ?? '',
            'phone' => $client->phone ?? '',
            'mobile' => $client->mobile ?? '',
            'address' => $client->address ?? '',
            'comment' => $client->comment ?? '',
            'expiration' => $client->expiration ?? now()->addYear(),
            'createdon' => now(),
            'createdby' => 'RadiusFusion',
            'owner' => 'RadiusFusion',
            'lang' => 'ar',
            'enableuser' => 1,
        ]);
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

    public function addDeposit(array $data)
    {
        return RMInvoice::create([
            'invgroup' => '0',
            'invnum' => '2025-0010',
            'managername' => 'RadiusFusion',
            'username' => $data['username'],
            'service' => 'Deposit',
            'date' => $data['date'],
            'comment' => $data['comment'],
            'amount' => $data['amount'],
            'price' => $data['price'],
            'bytescomb' => 0,
            'comblimit' => 0,
            'days' => 0,
            'expiration' => $data['expiration'],
        ]);
    }

    public function addWithdraw(array $data)
    {
        return RMInvoice::create([
            'invgroup' => '0',
            'invnum' => '2025-0010',
            'managername' => 'RadiusFusion',
            'username' => $data['username'],
            'service' => 'Withdraw',
            'date' => $data['date'],
            'comment' => $data['comment'],
            'amount' => $data['amount'],
            'price' => $data['price'],
            'bytescomb' => 0,
            'comblimit' => 0,
            'days' => 0,
            'expiration' => $data['expiration'],
        ]);
    }
}
