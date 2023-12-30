<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $table = 'expense';
    protected $primaryKey = 'id_expense';
    public $timestamps = false;
    protected $fillable = [
        'history_transaction_id_akun','expense_name', 'date', 'total_expense'
    ];

    public function akun()
    {
        return $this->belongsTo('App\Models\Akun', 'history_transaction_id_akun', 'id_akun');
    }

}
