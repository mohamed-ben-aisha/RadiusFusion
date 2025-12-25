<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Reseller extends Model
{
    protected $fillable = [
        'name',
        'branch_id',
        'company',
        'mobile',
        'phone',
        'credits',
        'comment',
        'status',
    ];

    public function branch(): BelongsTo
    {
        return $this->belongsTo(branch::class);
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }
}
