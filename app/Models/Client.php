<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Client extends Authenticatable
{
    use Notifiable;
    protected $guard = 'client';
    protected $fillable= ['name', 'contact', 'form', 'address', 'email', 'phone'];
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function orders(){
        return $this->hasMany(Order::class);
    }
    public function leads(){
        return $this->hasMany(Lead::class);
    }
}