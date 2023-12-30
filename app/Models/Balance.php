<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    protected $table = 'balance';
    protected $primaryKey = 'account_number';
    public $timestamps = false;
    protected $fillable = [
        'account_number', 'total_amount', 'bank_name'
    ];
}
