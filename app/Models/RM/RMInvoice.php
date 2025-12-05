<?php

namespace App\Models\RM;

use Illuminate\Database\Eloquent\Model;

class RMInvoice extends Model
{
    protected $connection = 'dynamic_mysql';

    protected $table = 'rm_invoices';
}
