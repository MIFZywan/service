<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{
    protected $table = 'akun';
    protected $primaryKey = 'id_akun';
    public $timestamps = false;
    protected $fillable = [
       'username', 'date', 'status_2', 'transaction_type', 'total_transaction'
    ];

    public function kategori()
    {
        return $this->hasMany('App\Models\Kategori', 'history_transaction_id_akun', 'id_akun');
    }
    public function budget()
    {
        return $this->hasMany('App\Models\Budget', 'history_transaction_id_akun', 'id_akun');
    }
    public function income()
    {
        return $this->hasMany('App\Models\Income', 'history_transaction_id_akun', 'id_akun');
    }
    public function expense()
    {
        return $this->hasMany('App\Models\Expense', 'history_transaction_id_akun', 'id_akun');
    }
}
