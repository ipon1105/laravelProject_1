@extends('layout.base')

@section('title')
Регистрация
@endsection

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
<main>

    <form class="leftmar" method="POST" action="{{route('user-registration-submit')}}">
        @csrf
        
        <div>
            Фамилия
            <input type="text" name="surname" value="{{ old('surname') }}">
        </div>
        <div>
            Имя
            <input type="text" name="name" value="{{ old('name') }}">
        </div>
        <div>
            Отчество
            <input type="text" name="patronymic" value="{{ old('patronymic') }}">
        </div>
        <div>
            Почта
            <input type="email" name="email" value="{{ old('email') }}">
        </div>
        <div>
            Пароль
            <input type="password" name="password">
        </div>
        <div>
            Подтверждение пароля
            <input type="password" name="password_confirmation">
        </div>
        <div>
            <button type="submit">Регистрация</button>
        </div>
    </form>
</main>
@endsection
