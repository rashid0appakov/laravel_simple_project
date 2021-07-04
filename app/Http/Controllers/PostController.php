<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
use App\Models\Setting;
use App\Models\Ip;
use Illuminate\Support\Str;
use Storage;
use Cache;
class PostController extends Controller
{
    public $fillable = [];
    public function __construct(){
        $this->fillable = [
            'name',
            'subname',
            'preview_text',
            'detail_text',
            'status',
            'area',
            'category_id',
            'gallery_id',
            'people_id',
            'doc',
            'link',
            'fond'
        ];
    }
    public function search(Request $request){
        $q = $request->q;
        $date = $request->date;
        if($request->wantsJson() || $request->ajax()) return Post::where('name', 'like', "%$q%")->orWhere('id', 'like', "%$q%")->get();

        $now = now();
        $categories = Cache::get('categories');
        $categories = $categories->map(function($item){ return $item->id; });
        $posts = Post::whereStatus("3");
        if($date) $posts = $posts->whereDate('created_at', $date);
        $posts = $posts->where(function($query) use ($q){
                $query->where('name', 'like', "%$q%")
                ->orWhere('preview_text', 'like', "%$q%")
                ->orWhere('detail_text', 'like', "%$q%");
            })->where(function($query) use ($now){
                $query->where('active_from', '<', $now)->orWhereNull('active_from');
            })->where(function($query) use ($now){
                $query->where('active_to', '>', $now)->orWhereNull('active_to');
            })
            ->whereIn('category_id', $categories)
            ->latest('created_at')->paginate(50);

        return view('search', compact('posts', 'q', 'date'));
    }
    public function comment(Request $request, Post $post){
        $ip = Ip::whereIp($request->ip())->first();
        if($ip->banned){
            session()->flash('warning', 'Вы не можете оставлять комментраии, так как были заблокированы администрацией');
            return back();
        }
        if(!$post->commentable) abort(403);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|string|max:255',
            'text' => 'required'
        ]);
        $data = $request->only(['name', 'email', 'text']);
        $filter = Setting::where('key', 'filter')->first();
        if($filter){
            $keys = explode(',', $filter->value);
            $data['name'] = str_replace($keys, '*', $data['name']);
            $data['text'] = str_replace($keys, '*', $data['text']);
        }
        $data['ip'] = $request->ip();
        if($request->parent_id){
            $comment = Comment::findOrFail($request->parent_id);
            $comment->comments()->create($data);
        }else{
            $post->comments()->create($data);
        }
        session()->flash('success', 'Ваш комментарий успешно опубликован');
        return back();
    }
    public function index(Request $request){
        $this->authorize('view-post', Post::class);
        $posts = Post::latest();
        $status = $request->status;
        if($status !== null) $posts->whereStatus($status);
        $posts = $posts->paginate(50);
        return view('admin.posts.index', compact('posts', 'status'));
    }
    public function create(){
        $this->authorize('create-post', Post::class);
        if(!auth()->user()->can('create-post')) abort(403);
        $categories = Category::all();
        $users = User::all();
        return view('admin.posts.create', compact('categories', 'users'));
    }
    public function store(Request $request){
        $this->authorize('create-post', Post::class);
        if(!auth()->user()->can('create-post')) abort(403);
        $request->validate([
            'name' => 'required|string|max:255|unique:posts',
            'preview_text' => 'required',
            'detail_text' => 'required',
            'preview_picture' => 'nullable|image',
            'detail_picture' => 'nullable|image',
        ]);
        $data = $request->only($this->fillable);
        $data['slug'] = Str::slug($data['name'], '-');
        $data['active_from'] = $request->active_from ? date('Y-m-d H:i:s', strtotime($request->active_from)) : null;
        $data['active_to'] = $request->active_to ? date('Y-m-d H:i:s', strtotime($request->active_to)) : null;
        $data['publish_at'] = $request->publish_at ? date('Y-m-d H:i:s', strtotime($request->publish_at)) : null;
        $data['top'] = $request->has('top');
        $data['ticker'] = $request->has('ticker');
        $data['marafon'] = $request->has('marafon');
        $data['commentable'] = $request->has('commentable');
        $data['marafon_stop_question'] = $request->has('marafon_stop_question');
        $data['user_id'] = $request->user_id ? $request->user_id : auth()->id();
        if($data['area']){
            Post::whereArea($data['area'])->update([
                'area' => NULL
            ]);
        }
        if($request->hasfile('preview_picture')){
            $data['preview_picture'] = $request->file('preview_picture')->store('posts');
        }
        if($request->hasfile('detail_picture')){
            $data['detail_picture'] = $request->file('detail_picture')->store('posts');
        }
        if($request->hasfile('audio')){
            $data['auido'] = $request->file('auido')->store('posts/sounds');
        }
        
        $post = Post::create($data);
        $post->actions()->create([
            'user_id' => auth()->id(),
            'text' => 'Запись создана'
        ]);
        if($request->hasfile('files')){
            foreach($request->file('files') as $file){
                $post->files()->create([
                    'src' => $file->store('galleries'),
                    'name' => $file->getClientOriginalName(),
                    'ext' => $file->extension(),
                    'size' => $file->getSize()
                ]);
            }
        }
        auth()->user()->log('Добавлена новость '. $post->name);
        session()->flash('success', 'Запись успешно создана');
        return redirect()->route('admin.posts.index');
    }
    public function show(Request $request, $category, $slug){
        $ip = Ip::whereIp($request->ip())->first();
        if($ip && $ip->banned && $ip->updated_at->addDays(7)->isBefore(now())){
            $ip->delete();
            $ip = false;
        }
        if($ip && $ip->warning && $ip->updated_at->addDays(3)->isBefore(now())){
            $ip->delete();
            $ip = false;
        }
        $post = Post::where('slug', $slug)->firstOrFail();
        if(($post->status != 3 || !$post->category || !$post->category->active) && (!auth()->check() || auth()->user()->cannot(['view-post']))) abort(404);
        if($post->commentable) $post->load('comments', 'comments.hearts');
        $post->increment('views');
        return view('post', compact('post', 'ip'));
    }
    public function edit(Post $post){
        $this->authorize('update-post', Post::class);
        if(!auth()->user()->can('update-post')) abort(403);
        $categories = Category::all();
        $users = User::all();
        $post->load(['category', 'related_posts', 'people']);
        return view('admin.posts.edit', compact('categories', 'post', 'users'));
    }
    public function update(Request $request, Post $post){
        $this->authorize('update-post', Post::class);
        $request->validate([
            'name' => 'required|string|max:255|unique:posts,id,' . $post->id,
            'preview_text' => 'required',
            'detail_text' => 'required',
            'preview_picture' => 'nullable|image',
            'detail_picture' => 'nullable|image',
        ]);
        $data = $request->only($this->fillable);
        $data['slug'] = Str::slug($data['name'], '-');
        $data['active_from'] = $request->active_from ? date('Y-m-d H:i:s', strtotime($request->active_from)) : null;
        $data['active_to'] = $request->active_to ? date('Y-m-d H:i:s', strtotime($request->active_to)) : null;
        $data['publish_at'] = $request->publish_at ? date('Y-m-d H:i:s', strtotime($request->publish_at)) : null;
        $data['top'] = $request->has('top');
        $data['ticker'] = $request->has('ticker');
        $data['marafon'] = $request->has('marafon');
        $data['commentable'] = $request->has('commentable');
        $data['marafon_stop_question'] = $request->has('marafon_stop_question');
        $data['user_id'] = $request->user_id ? $request->user_id : auth()->id();
        if($data['area']){
            Post::whereArea($data['area'])->where('id', '!=', $post->id)->update([
                'area' => NULL
            ]);
        }
        if(($request->has('del_preview') && $post->preview_picture) || $request->hasfile('preview_picture')){
            Storage::delete($post->preview_picture);
            $data['preview_picture'] = NULL;
        }
        if(($request->has('del_detail') && $post->detail_picture) || $request->hasfile('detail_picture')){
            Storage::delete($post->detail_picture);
            $data['detail_picture'] = NULL;
        }
        if(($request->has('del_audio') && $post->audio) || $request->hasfile('audio')){
            Storage::delete($post->audio);
            $data['audio'] = NULL;
        }
        
        if($request->hasfile('preview_picture')){
            $data['preview_picture'] = $request->file('preview_picture')->store('posts');
        }
        if($request->hasfile('detail_picture')){
            $data['detail_picture'] = $request->file('detail_picture')->store('posts');
        }
        if($request->hasfile('audio')){
            $data['audio'] = $request->file('audio')->store('posts/sounds');
        }
        $actionData = [];
        if($post->name != $request->name) $actionData['update_name'] = 1;
        if($post->ticker != $data['ticker']) $actionData['update_ticker'] = 1;
        if($post->top != $data['top']) $actionData['update_top'] = 1;
        if($post->marafon != $data['marafon']) $actionData['update_marafon'] = 1;
        if($post->marafon_stop_question != $data['marafon_stop_question']) $actionData['update_marafon_stop_question'] = 1;
        if($post->status != $data['status']) $actionData['update_status'] = 1;
        if($post->active_from != $data['active_from']) $actionData['update_active_from'] = 1;
        if($post->active_to != $data['active_to']) $actionData['update_active_to'] = 1;
        if($post->publish_at != $data['publish_at']) $actionData['update_publish_at'] = 1;
        if($post->preview_text != $data['preview_text']) $actionData['update_preview_text'] = 1;
        if($post->detail_text != $data['detail_text']) $actionData['update_detail_text'] = 1;
        if($post->category_id != $data['category_id']) $actionData['update_category_id'] = 1;
        if($post->gallery_id != $data['gallery_id']) $actionData['update_gallery'] = 1;
        if($request->hasFile('preview_picture')) $actionData['update_preview_picture'] = 1;
        if($request->hasFile('detail_picture')) $actionData['update_detail_picture'] = 1;
        
        if(count($actionData)){
            $actionData['text'] = Post::$statuses[$data['status']];
            $actionData['user_id'] = auth()->id();
            $post->actions()->create($actionData);
        }
        $post->update($data);
        if($request->hasfile('files')){
            foreach($request->file('files') as $file){
                $post->files()->create([
                    'src' => $file->store('galleries'),
                    'name' => $file->getClientOriginalName(),
                    'ext' => $file->extension(),
                    'size' => $file->getSize()
                ]);
            }
        }
        auth()->user()->log('Обновлена новость '. $post->name);
        session()->flash('success', 'Запись успешно изменена');
        return back();
    }
    public function destroy(Post $post){
        $this->authorize('delete-post', Post::class);
        foreach($post->files as $file){
            $file->delete();
        }
        $post->delete();
        session()->flash('success', 'Запись успешно удалена');
        auth()->user()->log('Удалена новость '. $post->name);
        return redirect()->route('admin.posts.index');
    }
}
