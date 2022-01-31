<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use Sluggable;
    use SoftDeletes;
    protected $table = 'products';
    protected $dates = ['deleted_at'];
    protected $fillable = [
     'cate_id'  , 'name','slug', 'small_description', 'description','original_price','selling_price','image','qty','tax','status','trending','meta_title','meta_keywords','meta_description'
    ];
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => ['name']
            ]
        ];
    }
    public function category(){
        return $this->belongsTo(Category::class,'cate_id','id');
    }
}
