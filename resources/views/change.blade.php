<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>iframe</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <script type="text/javascript">
        window.onmessage = function(e) {
            console.log('Get data from TOP.' + e.data);
        };

        function change(){
            var obj = {
                header: document.getElementById('changeHeader').value,
                content: document.getElementById('changeContent').value,
            };
            
            top.postMeassage(JSON.stringify(obj), '/blog');
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
    <button class="button topmar leftmar bottommar" onclick="change()">Изменить</a>
</html>