@section('header')
<header>
        <div>
            <h1 id="page">@yield('title')</h1>
            @auth
                <a href="{{ route('logout') }}">Выйти</a>
                User: {{auth()->user()->surname}} {{auth()->user()->name}} {{auth()->user()->patronymic}}
            @endauth
            @guest
                <a href="{{route('user-login')}}">Вход</a>
                <a href="{{route('user-registration')}}">Регистрация</a>
            @endguest
            <!-- Навигация с гиперссылками -->
            <nav>
                <ul>
                    <li>
                        <a href="{{ route('home') }}">Главная страница</a>
                    </li>
                    <li>
                        <a href="{{ route('about') }}">Обо мне</a>
                    </li>
                    <li>
                        <a href="{{ route('hobby') }}">Мои интересы </a>
                    </li>
                    <li>
                        <a href="{{ route('study') }}">Учёба</a>
                    </li>
                    <li>
                        <a href="{{ route('album') }}">Фотоальбом</a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}">Контакт</a>
                    </li>
                    <li>
                        <a href="{{ route('test') }}">Тест по дисциплине</a>
                    </li>
                    <li>
                        <a href="{{ route('guess') }}">Гостевая книга</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>