@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col">Новая запись</div>
    <div class="col text-right"><a href="{{route('admin.posts.index')}}" class="btn btn-sm btn-primary">К списку</a></div>
</div>
<hr>
<form action="{{route('admin.posts.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-4">
            <div class="form-group form-check">
                <input name="top" type="checkbox" class="form-check-input" id="top">
                <label class="form-check-label" for="top">Добавить в анонс</label>
            </div>
            <div class="form-group form-check">
                <input name="ticker" type="checkbox" class="form-check-input" id="ticker">
                <label class="form-check-label" for="ticker">Добавить в бегущую строку</label>
            </div>
            <hr>
            <small class="text-muted">Марафон</small>
            <div class="form-group form-check">
                <input name="marafon" type="checkbox" class="form-check-input" id="marafon">
                <label class="form-check-label" for="marafon">Добавить в марафон</label>
            </div>
            <div class="form-group form-check">
                <input name="marafon_stop_question" type="checkbox" class="form-check-input" id="marafon_stop_question">
                <label class="form-check-label" for="marafon_stop_question">Закончить прием вопросов</label>
            </div>
            <hr>
            <div class="form-group form-check">
                <input name="commentable" type="checkbox" class="form-check-input" id="commentable">
                <label class="form-check-label" for="commentable">Разрешить комментарии</label>
            </div>
            <div class="form-group">
                <label>Статус</label>
                <select name="status" class="form-control form-control-sm">
                    @foreach(\App\Models\Post::$statuses as $key => $status)
                    <option value="{{$key}}">{{$status}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Положение</label>
                <select name="area" class="form-control form-control-sm">
                    <option value="" selected>-</option>
                    <option value="0">Главная новость</option>
                    @foreach(range(1, 21) as $area)
                    <option value="{{$area}}">Ячейка {{$area}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Дата новости</label>
                <input type="text" readonly class="form-control form-control-sm datetime" autocomplete="off"data-timepicker="true" data-time-format='hh:ii' name="publish_at">
            </div>
            <div class="form-group">
                <label>Акстивна с</label>
                <input type="text" readonly class="form-control form-control-sm datetime" autocomplete="off" data-timepicker="true" data-time-format='hh:ii' name="active_from">
            </div>
            <div class="form-group">
                <label>Акстивна по</label>
                <input type="text" readonly class="form-control form-control-sm datetime" autocomplete="off" data-timepicker="true" data-time-format='hh:ii' name="active_to">
            </div>
            <div class="form-group">
                <label>Рубрика <span class="text-danger">*</span></label>
                <select name="category_id" class="form-control form-control-sm">
                    @foreach($categories as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Автор</label>
                <select name="category_id" class="form-control form-control-sm">
                    <option value="" selected disabled>-</option>
                    @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->full_name}}</option>
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
                <select class="form-control form-control-sm autocomplete" name="gallery_id" data-url="{{route('admin.galleries.search')}}" multiple>
                </select>
            </div>
            <div class="form-group">
                <label>Досье</label>
                <select class="form-control form-control-sm autocomplete" name="peoples[]" data-url="{{route('admin.peoples.search')}}" multiple>
                </select>
            </div>
            <div class="form-group">
                <label>По договору от</label>
                <input type="text" class="form-control form-control-sm" name="doc" value="{{old('doc')}}">
            </div>
            <div class="form-group">
                <label>Оплачено из фонда</label>
                <input type="text" class="form-control form-control-sm" name="fond" value="{{old('fond')}}">
            </div>
            <div class="form-group">
                <label>Ссылка на оригинал</label>
                <input type="text" class="form-control form-control-sm" name="link" value="{{old('link')}}">
            </div>
        </div>
        <div class="col-md-8">
            <div class="form-group">
                <label>Заголовок: <span class="text-danger">*</span></label>
                <input type="text" class="form-control form-control-sm" name="name">
            </div>
            <div class="form-group">
                <label>Врезка: <span class="text-danger">*</span></label>
                <textarea name="preview_text" class="form-control form-control-sm" rows="5"></textarea>
            </div>
            <div class="form-group">
                <label>Текст: <span class="text-danger">*</span></label>
                <textarea name="detail_text" class="form-control form-control-sm editor" rows="10"></textarea>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="d-block">Превью фото</label>
                        <input type="file" accept=".jpg,.jpeg,.png,.gif" name="preview_picture">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="d-block">Детальное фото</label>
                        <input type="file" accept=".jpg,.jpeg,.png,.gif" name="detail_picture">
                    </div>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label class="d-block">Аудио дорожка</label>
                <input type="file" name="audio">
            </div>
        </div>
    </div>
    <hr>
    <div class="form-group">
        <label class="d-block">Галерея</label>
        <input type="file" multiple name="files[]">
    </div>
    <div class="form-group">
        <button class="btn btn-sm btn-success">Сохранить</button>
    </div>
</form>
@stop