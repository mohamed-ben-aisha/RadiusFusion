<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProfileSpecPerBw extends Model
{
    protected $fillable = [
        'srvid',
        'starttime',
        'endtime',
        'dlrate',
        'ulrate',
        'dlburstlimit',
        'ulburstlimit',
        'dlburstthreshold',
        'ulburstthreshold',
        'dlbursttime',
        'ulbursttime',
        'enableburst',
        'priority',
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
            'enableburst' => 'boolean',
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
