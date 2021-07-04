<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    protected $guard = 'user';
    protected $fillable = [ 'name', 'active', 'photo', 'role_id', 'post', 'about', 'email', 'password' ];

    protected $hidden = [ 'password', 'remember_token' ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $with = ['role'];
    public function getFullNameAttribute($value){
        return $this->surname . ' ' . $this->name . ' ' . $this->lastname;
    }
    public function tasks(){
        return $this->morphMany(Task::class, 'taskable');
    }
    public function role(){
        return $this->belongsTo(Role::class);
    }
    public function before(){
        return $this->role_id == 1;
    }
    public function logs(){
        return $this->hasMany(Log::class);
    }
    public function log($text = false){
        if($text) $this->logs()->create([
            'text' => $text
        ]);
    }
}
