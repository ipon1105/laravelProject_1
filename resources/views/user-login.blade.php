@extends('layout.base')

@section('title')
Аунтификация
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
    <form class="leftmar" method="POST" action="{{ route('user-login-submit') }}">
        @csrf
        <div class="topmar">
            Почта
            <input type="email" name="email" value="{{ old('email') }}">
        </div>
      
        <div class="topmar">
            Пароль
            <input type="password" name="password" id="password">
        </div>
      
        <div class="topmar">
            <input type="checkbox" name="remember"> Запомнить меня
        </div>
      
        <div class="topmar">
            <button type="submit">Вход</button>
        </div>
    </form>
</main>
@endsection
