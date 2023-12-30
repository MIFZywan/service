<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $table = 'income';
    protected $primaryKey = 'id_income';
    public $timestamps = false;
    protected $fillable = [
        'history_transaction_id_akun','income_name', 'date', 'total_income'
    ];

    public function akun()
    {
        return $this->belongsTo('App\Models\Akun', 'history_transaction_id_akun', 'id_akun');
    }

}
