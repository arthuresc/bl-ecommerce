<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'product_id', 'colortag_id', 'quantity', 'price'];

    public function product() {
        return Product::where('id','=',$this->product_id)->first();
    }

    public function colortag() {
        return Tag::where('id','=',$this->colortag_id)->first();
    }
}
