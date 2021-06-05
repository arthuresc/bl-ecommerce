<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'street', 'number', 'city', 'state', 'cep', 'country' ];

    public static function address() {
        return Address::where('user_id', '=', Auth()->user()->id)->first();
    }

    public static function addressGet() {
        return Address::where('user_id', '=', Auth()->user()->id)->get();
    }

}
