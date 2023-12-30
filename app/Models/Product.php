<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;
    protected $table = 'product';
    protected $primaryKey = 'product_id';

    protected $fillable = [
        'name_product', 'stock', 'product_cost', 'unit_price', 'total_price', 'last_update', 'sales_id',
    ];

    public function sales()
    {
        return $this->belongsTo('App\Models\Sale', 'sales_id', 'sales_id');
    }
}
