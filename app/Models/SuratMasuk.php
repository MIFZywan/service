<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    public $timestamps = false;
    protected $table = 'surat_masuk';
    protected $primaryKey = 'id_kontrak';
    protected $fillable = ['instansi', 'contract_name', 'no_surat', 'tanggal_masuk', 'tenggat', 'email', 'keterangan'];
}

