<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name', 'description', 'price', 'quantity', 'minQuantity', 'mainImage', 'arrayImages', 'category_id', 'highlight'];

    public function category() {
        return $this->belongsTo(Category::class);  
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    public static function highlights() {
        return Product::all()->where('highlight', '=', 1)->take(6);
    }
}
