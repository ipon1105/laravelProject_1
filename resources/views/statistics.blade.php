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

    <table>
        <thead>
            <!-- Заголовки -->
            <tr>
                <td>Дата и время посещения</td>
                <td>Web-страница посещения</td>
                <td>IP-адрес компьютера посетителя</td>
                <td>Имя хоста компьютера посетителя</td>
                <td>Название браузера</td>
            </tr>
        </thead>
        <tbody>
            @isset($statistic)
                @foreach ($statistic as $el)
                    <tr>
                        <td>{{$el->time_statistic}}</td>
                        <td>{{$el->web_page}}</td>
                        <td>{{$el->ip_address}}</td>
                        <td>{{$el->host_name}}</td>
                        <td>{{$el->browser_name}}</td>
                    </tr>
                @endforeach
            @endisset
        </tbody>
        <tfoot>
        </tfoot>
    </table>

    @isset($statistic)
        {{$statistic->links()}}
    @endisset

@endsection
