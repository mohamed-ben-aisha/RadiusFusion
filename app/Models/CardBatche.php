<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CardBatche extends Model
{
    protected $fillable = [
        'service_id',
        'batch_code',
        'total_cards',
        'price_per_card',
        'total_amount',
        'status',
        'note',
    ];
}
