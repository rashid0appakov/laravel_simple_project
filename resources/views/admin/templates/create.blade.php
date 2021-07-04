@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col">Новый шаблон</div>
    <div class="col text-right"><a href="{{route('admin.templates.index')}}" class="btn btn-sm btn-primary">К списку</a></div>
</div>
<hr>
<form action="{{route('admin.templates.store')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-md-9">
            <div class="form-group">
                <label>Название</label>
                <input type="text" class="form-control form-control-sm @error('name') has-invalid @enderror" name="name" value="{{old('name')}}">
                @error('name')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label>Шаблон</label>
                <textarea name="html" class="form-control form-control-sm @error('name') has-invalid @enderror" rows="10">{{old('html')}}</textarea>
                @error('name')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
        </div>
        <div class="col-md-3 form-group">
            Встраиваемые поля <i class="fa fa-info-circle fa-lg text-info"></i>
            <p class="small">Эти поля иожно встраивать в любое место шаблона, при их существовании они будут заменены на их значения</p>
            <p class="small text-info">Нажмите, чтобы скопировать</p>
            <p class="small text-danger">Поля компании</p>
            <div class="nav flex-column copy-fields">
                <a href="#" class="nav-link small p-0" data-text="#company_name#">Название</a>
                <a href="#" class="nav-link small p-0" data-text="#company_description#">Описание</a>
                <a href="#" class="nav-link small p-0" data-text="#company_phone#">Телефон</a>
                <a href="#" class="nav-link small p-0" data-text="#company_email#">E-mail</a>
                <a href="#" class="nav-link small p-0" data-text="#company_address#">Адрес</a>
                <a href="#" class="nav-link small p-0" data-text="#company_uaddress#">Юридический адрес</a>
                <a href="#" class="nav-link small p-0" data-text="#company_bank#">Банк</a>
                <a href="#" class="nav-link small p-0" data-text="#company_inn#">ИНН</a>
                <a href="#" class="nav-link small p-0" data-text="#company_ogrn#">ОГРН</a>
                <a href="#" class="nav-link small p-0" data-text="#company_kpp#">КПП</a>
                <a href="#" class="nav-link small p-0" data-text="#company_bik#">БИК</a>
                <a href="#" class="nav-link small p-0" data-text="#company_ks#">КС</a>
                <a href="#" class="nav-link small p-0" data-text="#company_rs#">РС</a>
            </div>
            <p class="small text-danger">Поля клиента</p>
            <div class="nav flex-column copy-fields">
                <a href="#" class="nav-link small p-0" data-text="#client_name#">Название</a>
                <a href="#" class="nav-link small p-0" data-text="#client_phone#">Телефон</a>
                <a href="#" class="nav-link small p-0" data-text="#client_email#">E-mail</a>
                <a href="#" class="nav-link small p-0" data-text="#client_address#">Адрес</a>
                <a href="#" class="nav-link small p-0" data-text="#client_uaddress#">Юридический адрес</a>
                <a href="#" class="nav-link small p-0" data-text="#client_bank#">Банк</a>
                <a href="#" class="nav-link small p-0" data-text="#client_inn#">ИНН</a>
                <a href="#" class="nav-link small p-0" data-text="#client_ogrn#">ОГРН</a>
                <a href="#" class="nav-link small p-0" data-text="#client_kpp#">КПП</a>
                <a href="#" class="nav-link small p-0" data-text="#client_bik#">БИК</a>
                <a href="#" class="nav-link small p-0" data-text="#client_ks#">КС</a>
                <a href="#" class="nav-link small p-0" data-text="#client_rs#">РС</a>
            </div>
        </div>
        <div class="col-md-2 form-group">
            <label>&nbsp;</label>
            <button class="btn btn-block btn-outline-secondary btn-sm">Сохранить</button>
        </div>
    </div>
</form>
@stop