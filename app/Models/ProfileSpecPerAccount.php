<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProfileSpecPerAccount extends Model
{
    protected $fillable = [
        'srvid',
        'starttime',
        'endtime',
        'timeratio',
        'dlratio',
        'ulratio',
        'connallowed',
        'sat',
        'sun',
        'mon',
        'tue',
        'wed',
        'thu',
        'fri',
    ];

    protected function casts(): array
    {
        return [
            'connallowed' => 'boolean',
            'sat' => 'boolean',
            'sun' => 'boolean',
            'mon' => 'boolean',
            'tue' => 'boolean',
            'wed' => 'boolean',
            'thu' => 'boolean',
            'fri' => 'boolean',
        ];
    }

    public function profile(): BelongsTo
    {
        return $this->belongsTo(Profile::class);
    }
}
