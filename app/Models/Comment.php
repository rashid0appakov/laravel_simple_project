<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['name', 'email', 'text', 'ip'];
    public function commentable(){
        return $this->morphTo();
    }
    public function comments(){
        return $this->morphMany(Comment::class, 'commentable')->withCount('hearts')->orderBy('hearts_count')->orderBy('created_at');
    }
    public function delete(){
        foreach($this->comments as $comment) $comment->delete();
        parent::delete();
    }
    public function hearts(){
        return $this->hasMany(Like::class);
    }
}
