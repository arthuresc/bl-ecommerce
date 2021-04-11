<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name', 'tag_group_id'];

    public function tagGroup() {
        return $this->belongsTo(TagGroup::class)->withTrashed();
    }

    public function products() {
        return $this->belongsToMany(Product::class);
    }
}
