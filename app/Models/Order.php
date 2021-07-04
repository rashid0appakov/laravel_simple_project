<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public static $statuses = [
        'Новый',
        'Выполнен'
    ];
    protected $fillable = ['client_id', 'doc', 'doc_date', 'code_id', 'company_id', 'stock_id', 'status'];
    protected $with = ['client', 'stock', 'company'];
    public function files(){
        return $this->morphMany(File::class, 'fileable');
    }
    public function tasks(){
        return $this->morphMany(Task::class, 'taskable');
    }
    public function client(){
        return $this->belongsTo(Client::class);
    }
    public function services(){
        return $this->hasMany(OrderService::class);
    }
    public function stock(){
        return $this->belongsTo(Stock::class);
    }
    public function company(){
        return $this->belongsTo(Company::class);
    }
    public function code(){
        return $this->belongsTo(Code::class);
    }
}