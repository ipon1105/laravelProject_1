@section('header')
<header>
    <h1 class="bold topp left" > $ ./Hacker-Blog.sh admin "@yield('title')"</h1>
      
    <a href="{{route('blog')}}"             class="button leftmar">Библиотека записей</a>
    <a href="{{route('blog-edit')}}"        class="button ">Добавить запись</a>
    <a href="{{route('admin')}}"            class="button">Редактор</a>
    <a href="{{route('admin-statistic')}}"  class="button">История посещений</a>
    <a href="{{route('logout')}}"           class="button">Выйти</a>
    <hr class="hr"> <br>
</header>