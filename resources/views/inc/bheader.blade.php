@section('header')
<header>
    <h1 class="bold topp left" > $ ./Hacker-Blog.sh "@yield('title')"</h1>
      
    <a href="{{route('blog')}}" class="button leftmar">Библиотека записей</a>
    <a href="https://github.com/ipon1105/laravelProject_1" class="button">View on Github</a>
    <a href="{{route('admin')}}" class="button">Admin</a>
    <hr class="hr"> <br>
</header>