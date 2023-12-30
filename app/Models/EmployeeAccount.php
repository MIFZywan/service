<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeAccount extends Model
{
    protected $table = 'employee_account';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'karyawan_nip', 'email', 'password_account'
    ];

    public function karyawan()
    {
        return $this->belongsTo('App\Models\Karyawan', 'karyawan_nip', 'nip');
    }
}
