@extends('layout.blogbase')

@section('links')
@endsection

@section('title')Добавить запись@endsection

@section('body')
<form id="form" action="{{ route('blog-form') }}" method="POST">
    {{-- Тема сообщения --}}
    <div class="leftmar rightmar container">
        <div class="leftmar rightmar label">Тема записи ></div>
        <input class="inputHeader" type="text">
    </div>

    {{-- Поле ввода текста --}}
    <div class="leftmar rightmar topmar container">
        <div class="leftmar rightmar label">Текст записи ></div>
        <textarea class="inputMsg" name="text" rows="7"></textarea>
    </div>

    <button class="button leftmar topmar">Прикрепить изображение</button>
    <button class="button leftmar topmar" id="send" type="submit">Отправить</button>
</form>
@endsection
