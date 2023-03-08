@extends('layout.app')
@section('title', 'Форма обратно связи')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-border-box">
                    <form class="form-horizontal send-requset" enctype="multipart/form-data" role="form" method="POST" action="{{ route('form.post') }}">
                        <h2 class="normal">
                            <span>Оставление заявки</span>
                        </h2>
                        @csrf
                        <div class="form-group">
                            <label for="subject">Тема</label>
                            <input type="text" class="form-control" name="subject" id="subject">
                            @if ($errors->has('subject'))
                                <span class="text-danger">{{ $errors->first('subject') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="message">Текст</label>
                            <textarea class="form-control" id="message" name="message" rows="3"></textarea>
                            @if ($errors->has('message'))
                                <span class="text-danger">{{ $errors->first('message') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="file">Example file input</label>
                            <input type="file" class="form-control-file" id="file" name="file">
                            @if ($errors->has('file'))
                                <span class="text-danger">{{ $errors->first('file') }}</span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">Отправить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
