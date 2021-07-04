<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderService extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'code_id', 'size', 'doc', 'type', 'order_id'];
    public function code(){
        return $this->belongsTo(Code::class);
    }
}
