@extends('layouts.admin')

@section('right')
    <div class="card card-info">
        <div class="card-header">История действий</div>
        <div class="card-body p-2">
            @foreach($post->actions as $action)
                <div class="card card-info mb-2">
                    <div class="card-header py-1">
                        <div class="text-left small">{{$action->user->full_name}}</div>
                        <div class="row justify-content-between align-items-center">
                            <div class="col small text-left">{{$action->created_at->format('d.m.Y H:i')}}</div>
                            <div class="col small">{{$action->text}}</div>
                        </div>
                    </div>
                    <div class="card-body py-1">
                        <div class="row">
                            @if($action->update_name) <div class="col-md-6">Заголовок</div> @endif
                            @if($action->update_top) <div class="col-md-6">Анонс</div> @endif
                            @if($action->update_ticker) <div class="col-md-6">Бегущая строка</div> @endif
                            @if($action->update_line) <div class="col-md-6">Лента</div> @endif
                            @if($action->update_marafon) <div class="col-md-6">Марафон</div> @endif
                            @if($action->update_marafon_stop_question) <div class="col-md-6">Прием вопросов</div> @endif
                            @if($action->update_status) <div class="col-md-6">Статус</div> @endif
                            @if($action->update_active_from) <div class="col-md-6">Начало актиности</div> @endif
                            @if($action->update_active_to) <div class="col-md-6">Конец активности</div> @endif
                            @if($action->update_preview_text) <div class="col-md-6">Врезка</div> @endif
                            @if($action->update_detail_text) <div class="col-md-6">Текст</div> @endif
                            @if($action->update_category_id) <div class="col-md-6">Рубрика</div> @endif
                            @if($action->update_preview_picture) <div class="col-md-6">Превью фото</div> @endif
                            @if($action->update_detail_picture) <div class="col-md-6">Детальное фото</div> @endif
                            @if($action->update_gallery) <div class="col-md-6">Галерея</div> @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@stop
@section('content')
<div class="row">
    <div class="col">Редактирование записи</div>
    <div class="col text-right">
        <a href="{{route('admin.posts.index')}}" class="btn btn-sm btn-primary">К списку</a>
        <a href="{{route('posts.show', [$post->category->slug, $post->slug])}}" class="btn btn-sm btn-primary">Посомтреть</a>
        @can('delete-post')
        <form action="{{route('admin.posts.destroy', $post->id)}}" class="d-inline confirmed" method="POST">
            @csrf
            <input type="hidden" name="_method" value="DELETE">
            <button href="{{route('admin.posts.index')}}" class="btn btn-sm btn-danger">Удалить</button>
        </form>
        @endcan
    </div>
</div>
<hr>
<form action="{{route('admin.posts.update', $post->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group form-check">
                <input name="top" type="checkbox" class="form-check-input" id="top" value="1" @if($post->top) checked @endif >
                <label class="form-check-label" for="top">Добавить в анонс</label>
            </div>
            <div class="form-group form-check">
                <input name="ticker" type="checkbox" class="form-check-input" id="ticker" value="1" @if($post->ticker) checked @endif>
                <label class="form-check-label" for="ticker">Добавить в бегущую строку</label>
            </div>
            <hr>
            <small class="text-muted">Марафон</small>
            <div class="form-group form-check">
                <input name="marafon" type="checkbox" class="form-check-input" id="marafon" value="1" @if($post->marafon) checked @endif>
                <label class="form-check-label" for="marafon">Добавить в марафон</label>
            </div>
            <div class="form-group form-check">
                <input name="marafon_stop_question" type="checkbox" class="form-check-input" id="marafon_stop_question" value="1" @if($post->marafon_stop_question) checked @endif>
                <label class="form-check-label" for="marafon_stop_question">Закончить прием вопросов</label>
            </div>
            <hr>
            <div class="form-group form-check">
                <input name="commentable" type="checkbox" class="form-check-input" id="commentable" value="1" @if($post->commentable) checked @endif>
                <label class="form-check-label" for="commentable">Разрешить комментарии</label>
            </div>
            <div class="form-group">
                <label>Статус</label>
                <select name="status" class="form-control form-control-sm">
                    @foreach(\App\Models\Post::$statuses as $key => $status)
                    <option value="{{$key}}" @if($post->status == $key) selected @endif >{{$status}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Положение</label>
                <select name="area" class="form-control form-control-sm">
                    <option value="">-</option>
                    <option value="0" @if($post->area === 0) selected @endif>Главная новость</option>
                    @foreach(range(1, 21) as $area)
                    <option value="{{$area}}" @if($post->area === $area) selected @endif>Ячейка {{$area}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Дата новости</label>
                <input type="text" readonly class="form-control form-control-sm datetime" autocomplete="off" data-timepicker="true" data-time-format='hh:ii' name="publish_at" value="{{old('publish_at') ? old('publish_at') : ($post->publish_at ? $post->publish_at->format('d.m.Y H:i') : '')}}">
            </div>
            <div class="form-group">
                <label>Акстивна с</label>
                <input type="text" readonly class="form-control form-control-sm datetime" autocomplete="off" data-timepicker="true" data-time-format='hh:ii' name="active_from" value="{{old('active_from') ? old('active_from') : ($post->active_from ? $post->active_from->format('d.m.Y H:i') : '')}}">
            </div>
            <div class="form-group">
                <label>Акстивна по</label>
                <input type="text" readonly class="form-control form-control-sm datetime" data-timepicker="true" data-time-format='hh:ii' name="active_to" value="{{old('active_to') ? old('active_to') : ($post->active_to ? $post->active_to->format('d.m.Y H:i') : '')}}">
            </div>
            <div class="form-group">
                <label>Рубрика <span class="text-danger">*</span></label>
                <select name="category_id" class="form-control form-control-sm">
                    @foreach($categories as $item)
                        <option value="{{$item->id}}" @if($item->id == $post->category_id) selected @endif >{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Автор</label>
                <select name="user_id" class="form-control form-control-sm">
                    @foreach($users as $user)
                        <option value="{{$user->id}}" @if($post->user_id == $user->id) selected @endif>{{$user->full_name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Схожие новости</label>
                <select class="form-control form-control-sm autocomplete" name="posts[]" data-url="{{route('posts.search')}}" multiple>
                </select>
            </div>
            <div class="form-group">
                <label>Галерея</label>
                <select class="form-control form-control-sm autocomplete" name="gallery_id"
                    data-url="{{route('admin.galleries.search')}}"
                    @if($post->gallery)
                    data-default-value="{{$post->gallery->id}}"
                    data-default-text="{{$post->gallery->name}}"
                    @endif
                >
                </select>
            </div>
            <div class="form-group">
                <label>Досье</label>
                <select class="form-control form-control-sm autocomplete" name="people_id"
                    data-url="{{route('admin.peoples.search')}}"
                    @if($post->people)
                    data-default-value="{{$post->people->id}}"
                    data-default-text="{{$post->people->name}}"
                    @endif
                >
                </select>
            </div>
            <div class="form-group">
                <label>По договору от</label>
                <input type="text" class="form-control form-control-sm" name="doc" value="{{old('doc') ? old('doc') : $post->doc }}">
            </div>
            <div class="form-group">
                <label>Оплачено из фонда</label>
                <input type="text" class="form-control form-control-sm" name="fond" value="{{old('fond') ? old('fond') : $post->fond }}">
            </div>
            <div class="form-group">
                <label>Ссылка на оригинал</label>
                <input type="text" class="form-control form-control-sm" name="link" value="{{old('link') ? old('link') : $post->link }}">
            </div>
        </div>
        <div class="col-md-8">
            <div class="form-group">
                <label>Заголовок: <span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-sm" name="name" value="{{old('name') ? old('name') : $post->name }}">
            </div>
            <div class="form-group">
                <label>Врезка: <span class="text-danger">*</span></label>
                <textarea name="preview_text" class="form-control form-control-sm" rows="5">{{$post->preview_text}}</textarea>
            </div>
            <div class="form-group">
                <label>Текст: <span class="text-danger">*</span></label>
                <textarea name="detail_text" class="form-control form-control-sm editor" rows="10">{{$post->detail_text}}</textarea>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="d-block">Превью фото</label>
                        <input type="file" accept=".jpg,.jpeg,.png,.gif" name="preview_picture">
                    </div>
                    @if($post->preview_picture)
                        <div class="form-group form-check">
                            <input name="del_preview" type="checkbox" class="form-check-input" id="del_preview">
                            <label class="form-check-label" for="del_preview">Удалить превью фото</label>
                        </div>
                        <div class="preview_img" style="background-image: url(/storage/{{$post->preview_picture}})"></div>
                    @endif
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="d-block">Детальное фото</label>
                        <input type="file" accept=".jpg,.jpeg,.png,.gif" name="detail_picture">
                    </div>
                    @if($post->detail_picture)
                        <div class="form-group form-check">
                            <input name="del_detail" type="checkbox" class="form-check-input" id="del_detail">
                            <label class="form-check-label" for="del_detail">Удалить детальное фото</label>
                        </div>
                        <div class="preview_img" style="background-image: url(/storage/{{$post->detail_picture}})"></div>
                    @endif
                </div>
            </div>
            <hr>
            <div class="row align-items-center">
                <div class="col-md-7">
                    <div class="form-group">
                        <label class="d-block">Аудио дорожка</label>
                        <input type="file" name="audio">
                    </div>
                </div>
                @if($post->audio)
                    <div class="col-2">
                        <button type="button" class="btn btn-play btn-sm btn-success" data-src="/storage/{{$post->audio}}"><i class="fa fa-play"></i></button>
                    </div>
                    <div class="col-3">
                        <div class="form-group form-check">
                            <input name="del_audio" type="checkbox" class="form-check-input" id="del_audio" value="1">
                            <label class="form-check-label" for="del_audio">Удалить звуковой файл</label>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <hr>
    <div class="form-group">
        <label class="d-block">Дополнительные фото</label>
        <input type="file" multiple name="files[]">
    </div>
    <div class="form-group">
        <button class="btn btn-sm btn-success">Сохранить</button>
    </div>
</form>
Загруженные файлы:
<div class="row">
    <input type="text" class="copy-input">
    @foreach($post->files as $file)
        <div class="col-md-2 mb-3">
            @if(in_array($file->ext, ['jpeg', 'jpg','png', 'svg', 'tif']))
            <div class="preview_img" style="background-image: url(/storage/{{$file->src}})">
                <div class="buttons">
                    <button class="btn btn-sm btn-info copy-btn" data-src="/storage/{{$file->src}}"><i class="fa fa-copy"></i></button>
                    @can('update-post')
                    <form action="{{route('admin.files.destroy', $file->id)}}" class="d-inline-block confirmed" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-sm btn-danger btn-block"><i class="fa fa-trash"></i></button>
                    </form>
                    @endcan
                </div>
            </div>
            @elseif(in_array($file->ext, ['wmv', 'avi', 'webm', 'ogv', 'mp4', '3gp']))
            <div class="preview_img">
                <video src="/storage/{{$file->src}}"></video>
                <div class="buttons">
                    <button class="btn btn-sm btn-info copy-btn" data-src="/storage/{{$file->src}}"><i class="fa fa-copy"></i></button>
                    @can('update-post')
                    <form action="{{route('admin.files.destroy', $file->id)}}" class="d-inline-block confirmed" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-sm btn-danger btn-block"><i class="fa fa-trash"></i></button>
                    </form>
                    @endcan
                </div>
            </div>
            @endif
        </div>
    @endforeach
</div>
@stop