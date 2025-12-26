<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Profile extends Model
{
    protected $fillable = [
        'name',
        'description',
        'downrate',
        'uprate',
        'limitdownload',
        'limitupload',
        'limitexpire',
        'limituptime',
        'unitprice',
    ];

    protected function casts(): array
    {
        return [
            'limitdownload' => 'boolean',
            'limitupload' => 'boolean',
            'limitexpire' => 'boolean',
            'limituptime' => 'boolean',
        ];
    }

    public function servers(): BelongsToMany
    {
        return $this->belongsToMany(Server::class);
    }
}
