<?php

namespace App\Models\RM;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Radacct extends Model
{
    protected $connection = 'dynamic_mysql';

    protected $table = 'radacct';

    public $timestamps = false;

    protected $primaryKey = 'radacctid';

    protected $fillable = [
        'acctsessionid',
        'acctuniqueid',
        'username',
        'groupname',
        'realm',
        'nasipaddress',
        'nasportid',
        'nasporttype',
        'acctstarttime',
        'acctstoptime',
        'acctsessiontime',
        'acctauthentic',
        'connectinfo_start',
        'connectinfo_stop',
        'acctinputoctets',
        'acctoutputoctets',
        'calledstationid',
        'callingstationid',
        'acctterminatecause',
        'servicetype',
        'framedprotocol',
        'framedipaddress',
        'acctstartdelay',
        'acctstopdelay',
        'xascendsessionsvrkey',
        '_accttime',
        '_srvid',
        '_dailynextsrvactive',
        '_apid',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(RMUser::class, 'username', 'username');
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(RMService::class, '_srvid', 'srvid');
    }
}
