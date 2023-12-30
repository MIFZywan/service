<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';
    protected $primaryKey = 'customer_id';

    protected $fillable = [
        'name_customer', 'no_hp', 'address',
    ];

    public function sales()
    {
        return $this->hasMany('App\Models\Sale', 'customer_id', 'customer_id');
    }
}
