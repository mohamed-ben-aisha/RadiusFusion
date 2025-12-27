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
        'limitdl',
        'limitul',
        'limitexpiretion',
        'limituptime',
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
        'resetctrdate',
        'resetctrneg',
        'pricecalcdownload',
        'pricecalcupload',
        'pricecalcuptime',
        'unitpricetax',
        'unitpriceaddtax',
        'enableburst',
        'dlburstlimit',
        'ulburstlimit',
        'dlburstthreshold',
        'ulburstthreshold',
        'dlbursttime',
        'ulbursttime',
        'enableservice',
        'dlquota',
        'ulquota',
        'combquota',
        'timequota',
        'priority',
        'nextsrvid',
        'dailynextsrvid',
        'disnextsrvid',
        'availucp',
        'renew',
        'carryover',
        'policymapul',
        'custattr',
        'gentftp',
        'cmcfg',
        'advcmcfg',
        'addamount',
        'ignstatip',
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

    public function profileSpecPerAccounts(): BelongsToMany
    {
        return $this->belongsToMany(ProfileSpecPerAccount::class);
    }

    public function profileSpecPerBws(): BelongsToMany
    {
        return $this->belongsToMany(ProfileSpecPerBw::class);
    }
}
