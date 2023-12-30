<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StorageTank extends Model
{
    public $timestamps = false;
    protected $table = 'tangki_penyimpanan';
    protected $primaryKey = 'id_tangki_penyimpanan';
    protected $fillable = [
        'nama', 'jenis_minyak', 'lokasi', 'volume'
    ];
}
