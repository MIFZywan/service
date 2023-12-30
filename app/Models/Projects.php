<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    protected $table = 'projects';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'nama_proj', 'desc_proj'
    ];


    public function task()
    {
        return $this->belongsTo('App\Models\Tasks', 'id', 'id_project');
    }

}
