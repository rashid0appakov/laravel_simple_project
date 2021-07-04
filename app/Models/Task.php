<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['name', 'text', 'user_id'];
    public function taskable(){
        return $this->morphTo();
    }
}