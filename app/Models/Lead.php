<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'message'];
    public function client(){
        return $this->belongsTo(Client::class);
    }
    public function tasks(){
        return $this->morphMany(Task::class, 'taskable');
    }
}
