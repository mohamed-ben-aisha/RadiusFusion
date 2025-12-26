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
        'comment',
        'type_account',
        'branch_id',
        'profile_id',
        'status',
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

    public function profile(): BelongsTo
    {
        return $this->belongsTo(Profile::class);
    }
}
