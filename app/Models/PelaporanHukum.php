<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PelaporanHukum extends Model
{

    public $timestamps = false;
    protected $table = 'hukum';
    protected $primaryKey = 'id_hukum';
    protected $fillable = ['nama_pelapor', 'karyawan_nip', 'divisi_pelapor', 'perihal_laporan', 'tanggal_masuk', 'tenggat', 'email'];
}