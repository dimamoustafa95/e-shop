<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    protected $table = 'wish_lists';
    protected $fillable = [
        'user_id',
        'prod_id',
    ];
    public function products(){
        return $this->belongsTo(Product::class,'prod_id','id');
    }
}
