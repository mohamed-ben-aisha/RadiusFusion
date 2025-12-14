<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class branch extends Model
{
    protected $fillable = [
        'name',
        'server_id',
        'comment',
    ];

    public function server(): BelongsTo
    {
        return $this->belongsTo(Server::class);
    }

    public function resellers(): HasMany
    {
        return $this->hasMany(Reseller::class);
    }
}
