<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Card extends Model
{
    protected $fillable = [
        'card_batche_id',
        'service_id',
        'username',
        'password',
        'status',
        'sold_at',
        'used_at',
        'expires_at',
        'sold_to',
    ];

    public function cardBatche(): BelongsTo
    {
        return $this->belongsTo(CardBatche::class);
    }

    public function soldTo(): BelongsTo
    {
        return $this->belongsTo(Client::class, 'sold_to');
    }
}
