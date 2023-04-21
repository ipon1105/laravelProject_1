@section('header')
<header>
        <div>
            <!-- <div class="local-story">
                <img src="source/img/icon_1.png">
                <a href="history">История просмотра</a>
            </div> -->
            <h1 id="page">@yield('title')</h1>
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
                        <!-- <ul id="ul_submenu" class="submenu">
                            <li><a href="hobby#my_1">Моя любимая музыка</a></li>
                            <li><a href="hobby#my_2">Любимые выди спорта</a></li>
                            <li><a href="hobby#my_3">Мои любимые книги</a></li>
                            <li><a href="hobby#my_4">Мои любимые фильмы</a></li>
                            <li><a href="hobby#my_5">Моя любимая</a> </li>
                        </ul> -->
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
                </ul>
            </nav>
        </div>
    </header>