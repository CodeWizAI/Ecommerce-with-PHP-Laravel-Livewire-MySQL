<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
    use HasFactory,Sluggable;

    protected $table='products';
 
       
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    
}
