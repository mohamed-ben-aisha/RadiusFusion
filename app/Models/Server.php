<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    protected $fillable = [
        'name',
        'description',
        'host',
        'port',
        'user',
        'password',
        'db_name',
    ];
}
