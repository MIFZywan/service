<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    public $timestamps = false;
    protected $table = 'surat_keluar';
    protected $primaryKey = 'id_kontrak';
    protected $fillable = ['instansi', 'contract_name', 'no_surat', 'tanggal_keluar', 'tenggat', 'email', 'keterangan'];
}
