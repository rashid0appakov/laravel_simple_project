<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public static $short_forms = ['', 'ИП', 'ООО', 'ЗАО', 'ОАО'];
    public static $forms = ['', 'Индивидуальный предприниматель', 'Общество с ограниченной ответственностью', 'Закрытое акционерное общество', 'Открытое акционерное общество'];
    protected $fillable = ['name','logo','form','license','license_date','leader1','leader2','prefix','email','description','phone','address','uaddress','inn','bik','ks','rs','bank','ogrn','kpp'];
}
