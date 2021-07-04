@extends('layouts.site_inside')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="feedback-form-wrp">
                <div class="feedback-form-block container">
                    <div class="feedback-form-content">
                        <span class="feedback-form-title">
                            Авторизация
                        </span>
                        <div class="forms-block feedback">
                            <form class="feedback-form" action="{{ route('login.' . $url) }}" method="post">
                                @csrf
                            <p><input
                                class="contact-form_input feedback-input"
                                type="email"
                                placeholder="Ваш email"
                                name="email"
                            />
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </p>
                            <p>
                                <input
                                class="contact-form_input feedback-input"
                                type="password"
                                placeholder="Ваш пароль:"
                                name="password"
                            />
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </p>
                            <p>
                            <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label text-white" for="remember">
                                        Запомнить меня
                                    </label>
                                </div>
                            </p>
                            <p><button class="feedback-btn btn" type="submit">Войти</button></p> 
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
