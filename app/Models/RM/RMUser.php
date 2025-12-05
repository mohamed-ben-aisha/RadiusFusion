<?php

namespace App\Models\RM;

use Illuminate\Database\Eloquent\Model;

class RMUser extends Model
{
    protected $connection = 'dynamic_mysql';
    protected $table = 'rm_users';
}
