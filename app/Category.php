<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use Sluggable;
    use SoftDeletes;
    protected $table = 'categories';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name', 'slug', 'description','status','popular','image','meta_title','meta_descrip','meta_keywords'
    ];
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => ['name']
            ]
        ];
    }
}
