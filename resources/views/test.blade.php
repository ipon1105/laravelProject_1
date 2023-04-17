@extends('layout.base')

@section('title')
Тест
@endsection

@section('body')
    
<main>
    <form id="form" action="mailto:my_world1105@mail.ru?subject=Тест по 'Чиленные методы в информатике'" method="post">
        <!-- Данные пользователя -->
        <div>
            <fieldset>
                <legend>Данные пользователя</legend>
                <div class="box">Ваше ФИО: <input id="fio_1" type="text" name="fio"
                        placeholder="Коновалов Иван Викторович"></div>
                <div class="box">Ваша группа:
                    <select name="Group">
                        <option value="001">ПИ/Б-20-1-о</option>
                        <option value="002">ИВТ/Б-20-1-о</option>
                        <option value="003">ИВТ/Б-20-2-о</option>
                        <option value="004">ПИН/Б-20-2-о</option>
                        <option value="005">ИС/Б-20-2-о</option>
                        <option value="006">УТС/Б-20-1-о</option>
                        <option value="007">УТС/Б-20-2-о</option>
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
