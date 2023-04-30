@section('header')
<header>
    <h1 class="bold topp left" > $ ./Hacker-Blog.sh "@yield('title')"</h1>
      
    <a href="{{route('blog')}}" class="button leftmar">Библиотека записей</a>
    <a href="{{route('blog-edit')}}" class="button ">Добавить запись</a>
    <a href="https://github.com/ipon1105/laravelProject_1" class="button ">View on Github</a>
    <hr class="hr"> <br>
</header>