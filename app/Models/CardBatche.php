<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CardBatche extends Model
{
    protected $fillable = [
        'service_id',
        'batch_code',
        'total_cards',
        'price_per_card',
        'total_amount',
        'status',
        'type',
        'note',
    ];

    public function cards(): HasMany
    {
        return $this->hasMany(Card::class);
    }

    public function server(): BelongsTo
    {
        return $this->belongsTo(Server::class);
    }
}
