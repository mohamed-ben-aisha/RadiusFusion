<?php

namespace App\Models\RM;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class RMService extends Model
{
    protected $connection = 'dynamic_mysql';

    protected $table = 'rm_services';

    public $timestamps = false;

    protected $primaryKey = 'srvid';

    protected $fillable = [
        'srvname',
        'downrate',
        'uprate',
        'limitdl',
        'limitul',
        'limitcomb',
        'limitexpiration',
        'limituptime',
        'poolname',
        'unitprice',
        'unitpriceadd',
        'timebaseexp',
        'timebaseonline',
        'timeunitexp',
        'timeunitonline',
        'trafficunitdl',
        'trafficunitul',
        'trafficunitcomb',
        'inittimeexp',
        'inittimeonline',
        'initdl',
        'initul',
        'inittotal',
        'srvtype',
        'timeaddmodeexp',
        'timeaddmodeonline',
        'trafficaddmode',
        'monthly',
        'enaddcredits',
        'minamount',
        'minamountadd',
        'resetcounters',
        'pricecalcdownload',
        'pricecalcupload',
        'pricecalcuptime',
        'enableservice',
        'dlquota',
        'ulquota',
        'combquota',
        'timequota',
        'nextsrvid',
        'dailynextsrvid',
        'availucp',
        'renew',
        'carryover',
        'addamount',
        'ignstatip',
    ];

    protected function id(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->srvid,
        );
    }

    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->srvname,
            set: fn () => $this->srvname,
        );
    }

    protected function downrate(): Attribute
    {
        // 1048576 = 1024 * 1024
        return Attribute::make(
            get: fn ($value) => $value / 1048576,
            set: fn ($value) => $value * 1048576,
        );
    }

    protected function uprate(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value / 1048576,
            set: fn ($value) => $value * 1048576,
        );
    }
}
