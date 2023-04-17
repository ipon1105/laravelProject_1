@extends('layout.base')

@section('links')
    <link rel="stylesheet" type="text/css" href="{{ url('css/modal.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ url('css/tip.css') }}" >
@endsection

@section('title')
    Контакты
@endsection

@section('body')
    <!-- <div id='modal' class="modal">
        <div class="modal-window">
            <div id="modal-content">
                Вы уверены, что хотите отправить письмо?
            <div id="downPanel">
                <button id="prev" class="btn-prev">Нет</button>
                <button id="next" class="btn-next">Да</button>
            </div>
            </div><br>
            <button id='btn-close' class="btn-close">X</button>
        </div>
        <div class="overlay"></div>
    </div> -->
   

    <!-- action="mailto:my_world1105@mail.ru?subject=FeedBack" -->
    <!-- /contact/submit -->
    
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
    <form id="form" action="{{ route('contact-form') }}" method="POST">
        @csrf
        <fieldset>
            <legend>Отправить нам письмо</legend>

            <!-- Фамилия Имя Отчество -->
            <div class="box">
                <label for="fio">Ваше ФИО:</label>
                <input id="fio" type="text" name="fio" placeholder="Коновалов Иван Викторович" value="{{ old('fio') }}" >
            </div>

            <!-- Дата рождения -->
            <div class="box">
                <label for="my_date">Дата рождения:</label>
                <input id="my_date" type="text" name="date" placeholder="ММ/ДД/ГГГГ" value="{{ old('date')}}">
            </div>

            <!-- Номер телефона -->
            <div class="box">
                <label for="tel">Телефон:</label>
                <input id="tel" type="tel" name="tel" placeholder="+78005553535" value="{{ old('tel')}}"> 
            </div>
                
            <!-- Пол -->
            <div class="box">
                <label for="gender">Пол:</label>
                <input type="radio" id="women" name="gender" value="Женский" checked>
                <label for="women">Женщина</label>
                <input type="radio" id="man" name="gender" value="Мужской">
                <label for="man">Мужчина</label>
            </div>

            <!-- Почта -->
            <div class="box">
                <label for="email">Email для связи:</label>
                <input id="email" type="email" name="email" placeholder="Адрес электронной почты" value="{{ old('email')}}">
            </div>

            <!-- Возраст -->
            <div class="box">
                <label for="age">Возраст:</label>
                <select name="age">
                    <option value="0-14">меньше 14</option>
                    <option value="14-18">от 14 до 18</option>
                    <option value="18-27">от 18 до 27</option>
                    <option value="27-45">от 27 до 45</option>
                    <option value="45-69">от 45 до 69</option>
                    <option value="69-100">от 69 и больше</option>
                </select>
            </div>

            <!-- Кнопки управления -->
            <div class="box">
                <input id="send" type="submit" value="Отправить">
                <input type="reset" value="Отчистить форму"> <br>
            </div>
        </fieldset>
    </form>
</main>
   
@endsection
