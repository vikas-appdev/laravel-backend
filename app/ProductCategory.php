<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class ProductCategory extends Model
{
    use softDeletes;
    use Sluggable, SluggableScopeHelpers;

     protected $fillable = ['name','parent_id','visible','meta_title','meta_keywords','meta_description','description'];

       protected $casts = [
        'visible'  => 'boolean'
    ];

    public function parent()
    {
        return $this->belongsTo('App\Models\ProductCategory', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\Models\ProductCategory', 'parent_id');
    }

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'slug_or_name',
            ],
        ];
    }

    public function getSlugOrNameAttribute()
    {
        if ($this->slug != '') {
            return $this->slug;
        }

        return $this->name;
    }
}
