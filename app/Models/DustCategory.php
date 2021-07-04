<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DustCategory extends Model
{
    protected $fillable = ['name', 'slug'];
    public function dusts(){
        return $this->hasMany(Dust::class)->whereNotNull('dust_category_id');
    }
}
