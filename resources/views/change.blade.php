<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>iframe</title>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
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
            var id_ = Number(e.data);
            if (isNaN(id_) || id_ == null)
                return;

            id = id_;
        };

        function change(){
            if (id == null)
                return;

            var header = document.getElementById('changeHeader' ).value;
            var content = document.getElementById('changeContent').value
            if (header == null || isNaN(header) || header.length == 0)
                return;
            
            // Формируем новые данные
            var formData = new FormData();
            formData.append('id', id);
            formData.append('header',  header);
            formData.append('content', content);

            // Формируем параметры запроса
            const options = {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
            };

            // Выполняем запрос
            fetch('/blog/comment/change/post/'+id, options)
                .then(data => data.text())
                .then(result => {
                    top.postMessage(header + '\n' + content);
                })
                .catch(console.error);
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