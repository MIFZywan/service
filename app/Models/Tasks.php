<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    protected $table = 'tasks_rnd';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'id_project', 'karyawan_nip', 'nama_task', 'desc_task', 'status_task'
    ];

    public function karyawan()
    {
        return $this->belongsTo('App\Models\Karyawan', 'karyawan_nip', 'nip');
    }
    public function project()
    {
        return $this->hasMany('App\Models\Projects', 'id', 'id_project');
    }

}
