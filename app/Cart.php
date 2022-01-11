<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';
    protected $fillable = [
        'user_id',
        'prod_id',
        'prod_qty'
        ];
    public function products(){
        return $this->belongsTo(Product::class,'prod_id','id');
    }
}


