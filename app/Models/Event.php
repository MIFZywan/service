<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'event';
    protected $primaryKey = 'id_event';
    public $timestamps = false;
    protected $fillable = [
        'karyawan_nip', 'nama_event', 'desc_event', 'start_date', 'end_date'
    ];

    public function karyawan()
    {
        return $this->belongsTo('App\Models\Karyawan', 'karyawan_nip', 'nip');
    }
}
