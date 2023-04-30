@extends('layout.base')

@section('title')
   Гостевая книга
@endsection

@section('links')
    <link rel="stylesheet" type="text/css" href="{{ url('css/guess.css') }}" >
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
    <form id="form" action="{{ route('guess-form') }}" method="POST">
        @csrf
        <fieldset>
            <legend>Отправить отзыв</legend>

            <!-- Фамилия -->
            <div class="box">
                <label for="surname">Фамилия:</label>
                <input id="surname" type="text" name="surname" placeholder="Коновалов" value="{{ old('surname') }}" >
            </div>

            <!-- Имя -->
            <div class="box">
                <label for="name">Имя:</label>
                <input id="name" type="text" name="name" placeholder="Иван" value="{{ old('name') }}" >
            </div>

            <!-- Отчество -->
            <div class="box">
                <label for="patronymic">Отчество:</label>
                <input id="patronymic" type="text" name="patronymic" placeholder="Викторович" value="{{ old('patronymic') }}" >
            </div>

            <!-- Почта -->
            <div class="box">
                <label for="email">Email для связи:</label>
                <input id="email" type="email" name="email" placeholder="Адрес электронной почты" value="{{ old('email')}}">
            </div>

            <!-- Текст сообщения -->
            <div class="box">
                <label for="msg">Отзыв:</label>
                <input id="msg" type="text" name="msg" placeholder="Напишите отзыв" value="{{ old('msg') }}" >
            </div>
            
            <!-- Кнопки управления -->
            <div class="box">
                <input id="send" type="submit" value="Отправить">
                <input type="reset" value="Отчистить форму"> <br>
            </div>

        </fieldset>
    </form>
    
    <table>
                <thead>
                    <tr>
                        <td>Дата отзыва</td>
                        <td>ФИО</td>
                        <td>Email</td>
                        <td>Текст отзыва</td>
                    </tr>
                </thead>
                <tbody>
                    {{-- Generate data here --}}
                    @if (session('feedbacks'))
                        @foreach (session('feedbacks') as $row)
                            <tr>
                                <td> {{ $row->created_at }} </td>
                                <td> {{$row->surname}} {{$row->name}} {{$row->patronymic}} </td>
                                <td> {{$row->email}} </td>
                                <td> {{$row->msg}} </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
    </table>

    <a id="update" href="{{ route('guess-all') }}">Обновить</a>
</main>
@endsection
