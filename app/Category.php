<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Sluggable;
    protected $table = 'categories';
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
