@extends('layout.adminbase')

@section('links')
@endsection

@section('title') Страница администратора @endsection

@section('body')

    <!-- Успех -->
    @if (session('success'))
    <div class="alert alert-success" role="alert">
        <ul><li>{{ session('success') }}</li></ul>
    </div>
    @endif

    <!-- Ошибки -->
    @if($errors->any())
    <div class="alert alert-error">
    <ul>
        @foreach($errors->all() as $e)
        <li>{{ $e }}</li>
        @endforeach
    </ul>
    </div>
    @endif

    {{-- Добавить новую запись --}}
    <form id="form" enctype="multipart/form-data" action="{{ route('admin-add-form') }}" method="POST">
        @csrf

        {{-- Прикрепить изображение --}}
        <div class="leftmar rightmar container">
            <div class="leftmar rightmar label">Прикрепить изображение ></div>
            <input class="inputHeader" type="file" name="inputFile">
        </div>

        {{-- Тема сообщения --}}
        <div class="leftmar rightmar topmar container">
            <div class="leftmar rightmar label">Тема записи ></div>
            <input class="inputHeader" type="text" name="header">
        </div>

        {{-- Поле ввода текста --}}
        <div class="leftmar rightmar topmar container">
            <div class="leftmar rightmar label">Текст записи ></div>
            <textarea class="inputMsg" rows="7" name="content"></textarea>
        </div>

        <button class="button leftmar topmar" id="send" type="submit">Отправить</button>
    </form>

    {{-- Загрузить из файла --}}
    <form id="form" enctype="multipart/form-data" action="{{ route('admin-load-form') }}" method="POST">
        @csrf
        {{-- Прикрепить файл --}}
        <div class="leftmar rightmar container">
            <div class="leftmar rightmar label">Прикрепить файл ></div>
            <input class="inputHeader" type="file" name="inputFile">
        </div>
        <button class="button leftmar topmar" id="send" type="submit">Отправить</button>
     </form>
@endsection
