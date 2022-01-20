<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';
    protected $fillable = [
        'user_id',
        'prod_id',
        'user_review'
    ];
    public function user(){

    return $this->belongsTo(User::class);
    }

    public function product(){

        return $this->belongsTo(Product::class,'prod_id','id');
    }
}
