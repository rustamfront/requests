@extends('layout.app')
@section('title', 'Регистрация')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="form-border-box">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register.post') }}">
                        <h2 class="normal">
                            <span>Регистрация</span>
                        </h2>
                        @csrf
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Имя</label>
                            <input id="name" name="name" type="text" class="form-control" autofocus>
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Email</label>
                            <input id="email" name="email" type="email" class="form-control">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Пароль</label>
                            <input type="password" name="password" id="password" class="form-control">
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Подтверждение пароля</label>
                            <input type="password" name="password_confirmation" id="password-confirm" class="form-control">
                            @if ($errors->has('password_confirmation'))
                                <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                            @endif
                        </div>
                        <div class="form-group mb-3">
                            <div class="col-md-12 col-md-offset-4">
                                <button type="submit" class="submit btn btn-md btn-black">
                                    Регистрация
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
