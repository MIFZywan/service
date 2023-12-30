<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $table = 'sales';
    protected $primaryKey = 'sales_id';

    protected $fillable = [
        'product_id', 'customer_id', 'total_volume', 'invoice_date'
    ];

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer', 'customer_id', 'customer_id');
    }
    
    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id', 'product_id');
    }
}
