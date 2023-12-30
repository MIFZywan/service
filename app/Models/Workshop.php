<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
    public $timestamps = false;
    protected $table = 'workshop';
    protected $primaryKey = 'id_workshop';

    protected $fillable = [
        'nama_program', 'tanggal_pelaksanaan', 'durasi_pelaksanaan', 
        'penyelenggara', 'thumbnail', 'deskripsi_program', 'total_partisipan'
    ];


    
}
