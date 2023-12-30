<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    public $timestamps = false;
    protected $table = 'karyawan';
    protected $primaryKey = 'nip';

    protected $fillable = [
        'nama_lengkap', 'tanggal_lahir', 'alamat', 'nomor_telepon', 'email', 'jenis_kelamin', 'asal_devisi', 'foto_profil',
    ];


    public function EmployeeAccount()
    {
        return $this->hasOne('App\Models\EmployeeAccount', 'nip', 'nip');
    }
    public function tasks()
    {
        return $this->hasMany('App\Models\Tasks', 'karyawan_nip', 'nip');
    }
    public function feeds()
    {
        return $this->hasMany('App\Models\Feeds', 'karyawan_nip', 'nip');
    }
    public function event()
    {
        return $this->hasMany('App\Models\Event', 'karyawan_nip', 'nip');
    }
}
