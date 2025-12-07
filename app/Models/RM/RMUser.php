<?php

namespace App\Models\RM;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RMUser extends Model
{
    protected $connection = 'dynamic_mysql';

    protected $table = 'rm_users';

    protected $primaryKey = 'username';

    public $timestamps = false;

    protected $fillable = [
        'username',
        'sevid',
    ];

    public function service(): BelongsTo
    {
        return $this->belongsTo(RMService::class, 'srvid', 'srvid');
    }
}
