@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col">Редактирование компании {{$company->name}}</div>
    <div class="col text-right">
        <a href="{{route('admin.companies.index')}}" class="btn btn-sm btn-primary">К списку</a>
    </div>
</div>
<hr>
<form action="{{route('admin.companies.update', $company->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <div class="row">
        @if($company->logo)
            <div class="col-md-1">
                <img src="/storage/{{$company->logo}}" alt="" class="img-fluid">
            </div>
        @endif
        <div class="col-md-6"><label>Логотип <input type="file" name="logo"></label></div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label>Форма собственности</label>
                <select name="form" class="form-control form-control-sm">
                    <option @if(!old('form') && !$company->form) selected @endif value="">-</option>
                    <option @if(old('form') == 1 || (!old('form') && $company->form == 1)) selected @endif value="1">ИП</option>
                    <option @if(old('form') == 2 || (!old('form') && $company->form == 2)) selected @endif value="2">ООО</option>
                    <option @if(old('form') == 3 || (!old('form') && $company->form == 3)) selected @endif value="3">ЗАО</option>
                    <option @if(old('form') == 4 || (!old('form') && $company->form == 4)) selected @endif value="4">ОАО</option>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Название</label>
                <input type="text" class="form-control form-control-sm @error('name') has-invalid @enderror" name="name" value="{{old('name') ? old('name') : $company->name}}">
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
                <input type="text" class="form-control form-control-sm @error('license') has-invalid @enderror" name="license" value="{{old('license') ? old('license') : $company->license}}">
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
                <input type="text" class="form-control form-control-sm @error('license_date') has-invalid @enderror" name="license_date" value="{{old('license_date') ? old('license_date') : $company->license_date}}">
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
                <input type="text" class="form-control form-control-sm @error('leader1') has-invalid @enderror" name="leader1" value="{{old('leader1') ? old('leader1') : $company->leader1}}">
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
                <input type="text" class="form-control form-control-sm @error('leader2') has-invalid @enderror" name="leader2" value="{{old('leader2') ? old('leader2') : $company->leader2}}">
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
                <input type="text" class="form-control form-control-sm @error('prefix') has-invalid @enderror" name="prefix" value="{{old('prefix') ? old('prefix') : $company->prefix}}">
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