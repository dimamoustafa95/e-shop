<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    protected $table = 'order_items';
    protected $fillable = [
        'order_id',
        'prod_id',
        'qty',
        'price',
    ];
    public function products()
    {
        return $this->belongsTo(Product::class,'prod_id','id');
    }
}
