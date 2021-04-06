<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TagGroup extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name'];

    public function tags() {
        return $this->hasMany(Tag::class);
    }
}
