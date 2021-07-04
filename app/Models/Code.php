<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    public $timestamps = false;
    protected $fillable = ['code', 'name', 'types', 'short_code'];
}
