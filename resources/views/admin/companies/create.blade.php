@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col">Новая компания</div>
    <div class="col text-right"><a href="{{route('admin.companies.index')}}" class="btn btn-sm btn-primary">К списку</a></div>
</div>
<hr>
<form action="{{route('admin.companies.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <label>Логотип <input type="file" name="logo"></label>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Форма собственности</label>
                <select name="form" class="form-control form-control-sm">
                    <option @if(!old('form')) selected @endif value="">-</option>
                    <option @if(old('form') == 1) selected @endif value="1">ИП</option>
                    <option @if(old('form') == 2) selected @endif value="2">ООО</option>
                    <option @if(old('form') == 3) selected @endif value="3">ЗАО</option>
                    <option @if(old('form') == 4) selected @endif value="4">ОАО</option>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Название</label>
                <input type="text" class="form-control form-control-sm @error('name') has-invalid @enderror" name="name" value="{{old('name')}}">
                @error('name')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Лицензия №</label>
                <input type="text" class="form-control form-control-sm @error('license') has-invalid @enderror" name="license" value="{{old('license')}}">
                @error('license')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Лицензия от</label>
                <input type="text" class="form-control form-control-sm @error('license_date') has-invalid @enderror" name="license_date" value="{{old('license_date')}}">
                @error('license_date')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Руководитель (в именительном падеже)</label>
                <input type="text" class="form-control form-control-sm @error('leader1') has-invalid @enderror" name="leader1" value="{{old('leader1')}}">
                @error('leader1')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Руководитель (в родительном падеже)</label>
                <input type="text" class="form-control form-control-sm @error('leader2') has-invalid @enderror" name="leader2" value="{{old('leader2')}}">
                @error('leader2')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Префикс договора</label>
                <input type="text" class="form-control form-control-sm @error('prefix') has-invalid @enderror" name="prefix" value="{{old('prefix')}}">
                @error('prefix')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
        </div>
    </div>
    <div class="form-group">
        <label>&nbsp;</label>
        <button class="btn btn-block btn-outline-secondary btn-sm">Сохранить</button>
    </div>
</form>
@stop