@section('header')
<header>
        <div>
            <h1 id="page">@yield('title')</h1>
            <a href="{{route('user-login')}}">Вход</a>
            <a href="{{route('user-registration')}}">Регистрация</a>
            <!-- Навигация с гиперссылками -->
            <nav>
                <ul>
                    <li onmouseover="document.getElementById('img_1').src='source/img/figure_01.png';"
                        onmouseout="document.getElementById('img_1').src='source/img/figure_00.png';">
                        <img id="img_1" src="source/img/figure_00.png" >
                        <a href="{{ route('home') }}">Главная страница</a>
                    </li>
                    <li onmouseover="document.getElementById('img_2').src='source/img/figure_02.png';"
                        onmouseout="document.getElementById('img_2').src='source/img/figure_01.png';">
                        <img id="img_2" src="source/img/figure_01.png">
                        <a href="{{ route('about') }}">Обо мне</a>
                    </li>
                    <li onmouseover="document.getElementById('img_3').src='source/img/figure_03.png';"
                        onmouseout="document.getElementById('img_3').src='source/img/figure_02.png';"
                        id="li_top_of_submenu" class="top_of_submenu">
                        <img id="img_3" src="source/img/figure_02.png">
                        <a href="{{ route('hobby') }}">Мои интересы </a>
                    </li>
                    <li onmouseover="document.getElementById('img_4').src='source/img/figure_04.png';"
                        onmouseout="document.getElementById('img_4').src='source/img/figure_03.png';">
                        <img id="img_4" src="source/img/figure_03.png">
                        <a href="{{ route('study') }}">Учёба</a>
                    </li>
                    <li onmouseover="document.getElementById('img_5').src='source/img/figure_05.png';"
                        onmouseout="document.getElementById('img_5').src='source/img/figure_04.png';">
                        <img id="img_5" src="source/img/figure_04.png">
                        <a href="{{ route('album') }}">Фотоальбом</a>
                    </li>
                    <li onmouseover="document.getElementById('img_6').src='source/img/figure_06.png';"
                        onmouseout="document.getElementById('img_6').src='source/img/figure_05.png';">
                        <img id="img_6" src="source/img/figure_05.png">
                        <a href="{{ route('contact') }}">Контакт</a>
                    </li>
                    <li onmouseover="document.getElementById('img_7').src='source/img/figure_07.png';"
                        onmouseout="document.getElementById('img_7').src='source/img/figure_06.png';">
                        <img id="img_7" src="source/img/figure_06.png">
                        <a href="{{ route('test') }}">Тест по дисциплине</a>
                    </li>
                    <li onmouseover="document.getElementById('img_8').src='source/img/figure_08.png';"
                        onmouseout="document.getElementById('img_8').src='source/img/figure_07.png';">
                        <img id="img_8" src="source/img/figure_07.png" >
                        <a href="{{ route('guess') }}">Гостевая книга</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>