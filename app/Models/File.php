<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Storage;
class File extends Model
{
    protected $fillable = ['src', 'name', 'size', 'ext', 'title', 'description'];
    public function delete(){
        Storage::delete($this->src);
        parent::delete();
    }
    public function fileable(){
        return $this->morphTo();
    }
}
