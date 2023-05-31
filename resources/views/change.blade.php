<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>iframe</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <script type="text/javascript">
        // Уникальный идентификатор поста на редактирование 
        var id = null;

        // Принимаем информацию
        window.onmessage = function(e) {
            // Приём сообщений только от локальной сети
            if (e.origin != 'http://127.0.0.1:8000')
                return;

            // Приводим поступившее сообщение в число
            id = Number(e.data);
        };

        function change(){
            // Запоминаем новые данные
            var newHeader = document.getElementById('changeHeader').value;
            var newContent = document.getElementById('changeContent').value;
            

            window.top.postMeassage('doc', '*');
        }
    </script>

    {{-- Тема сообщения --}}
    <div class="leftmar rightmar topmar container">
        <div class="leftmar rightmar label">Тема записи ></div>
        <input id="changeHeader" class="inputHeader" type="text" name="header">
    </div>

    {{-- Поле ввода текста --}}
    <div class="leftmar rightmar topmar container">
        <div class="leftmar rightmar label">Текст записи ></div>
        <textarea id="changeContent" class="inputMsg" rows="7" name="content"></textarea>
    </div>

    {{-- Изменить --}}
    <button id="changeButton" class="button topmar leftmar bottommar" onclick="change()">Изменить</a>
</html>