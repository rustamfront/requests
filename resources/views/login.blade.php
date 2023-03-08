@extends('layout.app')
@section('title', 'Войти')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-border-box">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login.post') }}">
                        <h2 class="normal">
                            <span>Войти</span>
                        </h2>
                        @csrf
                        <div class="form-group mb-4">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="form-group mb-4">
                            <label for="password">Пароль</label>
                            <input type="password" class="form-control" name="password" id="password">
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">Войти</button>
                        <div class="text-center">
                            <p>Нет аккаунта? <a href="{{ route('register') }}">Зарегистрируйтесь</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
