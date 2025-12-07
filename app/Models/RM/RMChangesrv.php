<?php

namespace App\Models\RM;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RMChangesrv extends Model
{
    protected $connection = 'dynamic_mysql';

    protected $table = 'rm_changesrv';

    public $timestamps = false;

    protected $fillable = [
        'username',
        'newsrvid',
        'newsrvname',
        'scheduledate',
        'requestdate',
        'status',
        'transid',
        'requested',
    ];

    public function newService(): BelongsTo
    {
        return $this->belongsTo(RMService::class, 'newsrvid', 'srvid');
    }
}
