<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'firstname',
        'lastname',
        'username',
        'password',
        'company',
        'address',
        'email',
        'phone',
        'mobile',
        'srvid',
        'expiration',
        'uptimelimit',
        'comment',
        'acctype',
    ];

    protected function casts(): array
    {
        return [
            'expiration' => 'datetime',
        ];
    }
}
