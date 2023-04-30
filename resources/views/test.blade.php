@extends('layout.base')

@section('title')
Тест
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

    <!-- mailto:my_world1105@mail.ru?subject=Тест по 'Чиленные методы в информатике' -->
    <form id="form" action="{{ route('test-form') }}" method="POST">
        @csrf
        <!-- Данные пользователя -->
        <div>
            <fieldset>
                <legend>Данные пользователя</legend>
                <div class="box">Ваше ФИО: <input id="fio_1" type="text" name="fio"
                        placeholder="Коновалов Иван Викторович" value="{{ old('fio') }}"></div>
                <div class="box">Ваша группа:
                    <select name="group">
                        <option value="ПИ/Б-20-1-о" >ПИ/Б-20-1-о</option>
                        <option value="ИВТ/Б-20-1-о">ИВТ/Б-20-1-о</option>
                        <option value="ИВТ/Б-20-2-о">ИВТ/Б-20-2-о</option>
                        <option value="ПИН/Б-20-2-о">ПИН/Б-20-2-о</option>
                        <option value="ИС/Б-20-2-о" >ИС/Б-20-2-о</option>
                        <option value="УТС/Б-20-1-о">УТС/Б-20-1-о</option>
                        <option value="УТС/Б-20-2-о">УТС/Б-20-2-о</option>
                    </select>
                </div>
            </fieldset>
        </div>
        <!-- Ввод ответов -->
        <div class="quest_box">
            <fieldset>
                <legend>Тест по "Чиленные методы в информатике"</legend>
                <!-- Вопрос один, ответ Левые и Правые -->
                <article>
                    <h4>Вопрос №1:</h4>
                    Существующие и имеющие важное значение матричные степенные ряды это: <br>
                    <div id="my_box" class="box">
                        <label><input type="checkbox" name="check[]" value="check_1">Левые </label><br>
                        <label><input type="checkbox" name="check[]" value="check_2">Правые</label><br>
                        <label><input type="checkbox" name="check[]" value="check_3">Верние</label><br>
                        <label><input type="checkbox" name="check[]" value="check_4">Нижние</label><br>
                    </div>
                </article>
                <!-- Вопрос два, ответ Блочной -->
                <article>
                    <h4>Вопрос №2:</h4>
                    Матрица разбитая на клетки, называется клеточной и … <br>
                    <div class="box">
                        <select name="select">
                            <option value="select_1">Окаймленной</option>
                            <option value="select_2">Блочной</option>
                            <option value="select_3">Равной</option>
                            <option value="select_4">Квазидиагональной</option>
                            <option value="select_5">Средней</option>
                        </select>
                    </div>
                </article>
                <!-- Вопрос три, ответ Треугольной -->
                <article>
                    <h4>Вопрос №3:</h4>
                    Если элементы квадратной матрицы, стоящие выше (ниже) главной диагонали, равны нулю, то матрицу
                    называют: <br>
                    <div class="box">
                        <input id="input_1" type="text" name="input_1"><br>
                    </div>
                </article>
            </fieldset>
        </div>
        <div class="box">
            <input id="send" type="submit" value="Отправить">
            <input type="reset" value="Отчистить форму"><br>
        </div>
    </form>
</main>
@endsection
