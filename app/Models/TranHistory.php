<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TranHistory extends Model
{
    protected $table = 'transaction_history';
    protected $primaryKey = 'id_account';
    public $timestamps = false;
    protected $fillable = [
        'id_account','username', 'date', 'status', 'transaction_type', 'total_per_account'
    ];
}
