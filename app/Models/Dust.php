<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dust extends Model
{
    protected $fillable = ['name', 'slug', 'dust_category_id', 'text'];
    public function category(){
        return $this->belongsTo(DustCategory::class);
    }
}
