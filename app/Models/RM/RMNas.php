<?php

namespace App\Models\RM;

use Illuminate\Database\Eloquent\Model;

class RMNas extends Model
{
    protected $connection = 'dynamic_mysql';

    protected $table = 'nas';

    public $timestamps = false;

    protected $fillable = [
        'nasname',
        'shortname',
        'type',
        'ports',
        'secret',
        'community',
        'description',
        'starospassword',
        'ciscobwmode',
        'apiusername',
        'apipassword',
        'apiver',
        'coamode',
        'dhcp',
    ];
}
