<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    protected $table = 'budget';
    protected $primaryKey = 'id_budget';
    public $timestamps = false;
    protected $fillable = [
        'history_transaction_id_akun','budget_name', 'date', 'total_budget'
    ];

    public function akun()
    {
        return $this->belongsTo('App\Models\Akun', 'history_transaction_id_akun', 'id_akun');
    }

}
