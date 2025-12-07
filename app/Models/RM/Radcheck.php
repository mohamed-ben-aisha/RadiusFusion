<?php

namespace App\Models\RM;

use Illuminate\Database\Eloquent\Model;

class Radcheck extends Model
{
    protected $connection = 'dynamic_mysql';

    protected $table = 'radcheck';

    public $timestamps = false;
}
