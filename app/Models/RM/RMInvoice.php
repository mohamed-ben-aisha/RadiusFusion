<?php

namespace App\Models\RM;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class RMInvoice extends Model
{
    protected $connection = 'dynamic_mysql';

    protected $table = 'rm_invoices';

    public $timestamps = false;

    protected $fillable = [
        'invgroup',
        'invnum',
        'managername',
        'username',
        'date',
        'bytesdl',
        'bytesul',
        'bytescomb',
        'downlimit',
        'uplimit',
        'comblimit',
        'time',
        'uptimelimit',
        'days',
        'expiration',
        'service',
        'comment',
        'amount',
        'price',
        'balance',
    ];

    protected function bytescomb(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value / 1073741824,
            set: fn ($value) => $value * 1073741824,
        );
    }

    protected function comblimit(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value / 1073741824,
            set: fn ($value) => $value * 1073741824,
        );
    }
}
