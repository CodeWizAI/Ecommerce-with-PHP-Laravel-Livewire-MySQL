<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{
    use HasFactory, Sluggable;

    protected $table = "categories";

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }
    //recursice relation
    public function subCategories()
    {
        return $this->hasMany(Category::class)->with('categories');
    }
}
