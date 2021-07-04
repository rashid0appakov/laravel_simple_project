<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{    
    protected $fillable = [
        'slug',
        'name',
        'subname',
        'audio',
        'preview_text',
        'detail_text',
        'active_from',
        'active_to',
        'publish_at',      
        'preview_picture',
        'detail_picture',
        'doc',
        'fond',
        'link',
        'commentable',
        'top',
        'ticker',
        'marafon',
        'marafon_stop_question',
        'status',
        'area',
        'user_id',
        'category_id',
        'gallery_id',
        'people_id'];
    protected $casts = [
        'active_from' => 'datetime',
        'active_to' => 'datetime',
        'publish_at' => 'datetime',
    ];
    protected $with = ['category', 'user'];
    public function files(){
        return $this->morphMany(File::class, 'fileable');
    }
    public static $statuses = [
        'Новая', 'РДТ', 'ТС', 'Опубликовано', 'WWW'
    ];
    public function comments(){
        return $this->morphMany(Comment::class, 'commentable')->withCount('hearts')->orderBy('hearts_count')->orderBy('created_at');
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function gallery(){
        return $this->belongsTo(Gallery::class);
    }
    public function people(){
        return$this->belongsTo(People::class);
    }
    public function related_posts(){
        return $this->belongsToMany(Post::class, 'post_related_post');
    }
    public function delete(){
        if($this->preview_picture) Storage::delete($this->preview_picture);
        if($this->detail_picture) Storage::delete($this->detail_picture);
        foreach($this->comments as $comment) $comment->delete();
        parent::delete();
    }
    public function actions(){
        return $this->hasMany(Action::class)->latest();
    }
}
