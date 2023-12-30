<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $primaryKey = 'id_kategori';
    public $timestamps = false;
    protected $fillable = [
        'history_transaction_id_akun','kategori_nama', 'total_per_catagory'
    ];

    public function akun()
    {
        return $this->belongsTo('App\Models\Akun', 'history_transaction_id_akun', 'id_akun');
    }

}
