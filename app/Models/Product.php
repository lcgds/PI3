<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = ['name', 'brand', 'description', 'price', 'category_id', 'image', 'spotlight'];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    public static function getBestProducts() {
        return Product::all()->where('spotlight', '=', 1)->take(4);
    }
}
