<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        'branch_id',
    ];

    protected function casts(): array
    {
        return [
            'expiration' => 'datetime',
        ];
    }

    public function branch(): BelongsTo
    {
        return $this->belongsTo(Branch::class);
    }
}
