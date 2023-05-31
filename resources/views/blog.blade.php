@extends('layout.blogbase')

@section('links')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{ url('css/modal.css') }}" >
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('title')Библиотека записей@endsection

@section('body')

 {{-- Модальное окно --}}
 <div id="modalWin" class="modal">
   <div class="modal-window">
      <input type="hidden" name="_token" id="_token" value="{{ Session::token() }}" />
      <p>Комментарий ></p><br>
      <textarea class="leftmar" id="comment" name="comment" rows="5"></textarea><br>
      <button class="button topmar leftmar bottommar" onclick="onsubmitForm(document.getElementById('comment'))">Отправить</a>
      <button id="close_btn" class="btn-close" data-easy-toggle="#modalWin" data-easy-class="show">X</button>
   </div>
   <div class="overlay" data-easy-toggle="#modalWin" data-easy-class="show"></div>
</div>

<div id="changeModal" class="modal">
   <div class="modal-window" style="height: 300px">
      <div id="iframe_block">
         
      </div>
      
      <button id="changeModalClose" class="btn-close" data-easy-toggle="#modalWin" data-easy-class="show">X</button>
   </div>
   <div class="overlay" data-easy-toggle="#modalWin" data-easy-class="show"></div>
</div>

<script type="text/javascript">
   var iframe = null;
   var iframe_post_id = null;
   var changeModal = document.getElementById('changeModal');
   var changeClose = document.getElementById('changeModalClose');
   var changeBlock = document.getElementById('iframe_block');
   
   window.onmessage = function(e){
      // Приём сообщений только от локальной сети
      if (e.origin != 'http://127.0.0.1:8000')
         return;
      
      var str = ""+e.data;
      if (str == null || str == "")
         return;

      var header = str.substring(0, str.indexOf('\n'));
      var content = str.substring(str.indexOf('\n'), str.length);
      if (header == null || header == "" || content == null || content == "")
         return;

      updateChange(header, content);
      closeChange();
   };

   // Закрываем модальное окно
   changeClose.onclick = closeChange;
   function closeChange(){
      iframe = null;
      changeBlock.innerHTML = "";
      changeModal.classList.remove("show");

      // Обновляем комментарии
      if (iframe_post_id == null)
         return;
      load_comments_to(iframe_post_id);
      iframe_post_id = null;
   }

   // Открываем модальное окно
   function openChange(id){
      changeModal.classList.add("show");

      iframe = document.createElement("iframe");
      iframe.style="height: 300px; width: 550px; frameBorder='0'";
      iframe.onload = function() { iframe.contentWindow.postMessage(""+id, '*'); };
      iframe.onerror = function() { console.log("Что-то пошло не так."); };
      iframe.src = "/blog/comment/change/get/"+id;
      iframe_post_id = id;

      changeBlock.appendChild(iframe);
   }

   // Обновить блок поста
   function updateChange(newHeader, newContent){
      if (iframe_post_id == null || isNaN(iframe_post_id))
         return;

      document.getElementById( 'header_' + iframe_post_id).innerHTML = newHeader;
      document.getElementById('content_' + iframe_post_id).innerHTML = newContent;
   }
</script>

<script type="text/javascript">
   var noteID = 1;
   document.getElementById('close_btn').onclick = closeModal;

   function closeModal(){
      var modal = document.getElementById('modalWin');
      modal.classList.remove("show");
   }

   function openModal(id){
      var modal = document.getElementById('modalWin');
      modal.classList.add("show");
      noteID = id;
   }

   let add_url = '/blog/comments/add';
   let load_url = '/blog/comments/load';
   
   
   // Загрузка комментариев для записи по id
   function load_comments_to(note_id) {
      // Получаем все блоки для комментариев
      var comments_blocks = document.getElementsByClassName('comments_block');

      // Получаем блок комментариев для данного поста
      var comments_block = document.getElementById('comments_block_'+note_id);
      
      // Если Блок для комментариев не пустой, то отчищаем его, что бы заполнить заново
      if (comments_block.childNodes.length > 0) {
         comments_block.innerHTML = "";
      }

      // Выполняем ассинхронное заполнение
      fetch(load_url + '/' + note_id)
         .then(response => response.text())
         .then(data => {
            // Если вернулся fail, то завершаем заполнение
            if (data == 'fail'){
               return;
            }
            
            let parser = new DOMParser();
            let xmlDom = parser.parseFromString(data, "application/xml");
            let comments = xmlDom.querySelectorAll('comment');

            // Для каждого комментария создаём блок комментария с необходимыми полями
            comments.forEach(element => {
               var comment = document.createElement("div");
               var classattrib = "inset 12px 222px 2px 2px rgba(1,2,111,11)";
               comment.style.boxShadow = classattrib;
               
               var date = document.createElement("p");
               var name = document.createElement("p");
               var content = document.createElement("p");
               
               date.appendChild(document.createTextNode(element.children[1].innerHTML));
               name.appendChild(document.createTextNode(element.children[0].innerHTML));
               content.appendChild(document.createTextNode(element.children[2].innerHTML));
               
               comment.appendChild(date);
               comment.appendChild(name);
               comment.appendChild(content);

               comments_block.appendChild(comment);
            });
         })
         .catch(console.error);
   }

   function onsubmitForm(text){
      var input = new FormData();
      input.append('comment', text.value);
      input.append('note_id', noteID);
      
      const options = {
         method: 'POST',
         body: input,
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
         },
      };

      fetch(add_url, options)
         .then(data => data.text())
         .then(result => {
            closeModal();
            load_comments_to(noteID);
         })
         .catch(console.error);
   }
   
</script>

@foreach ($notes as $note)
   <div class="container leftmar rightmar topmar">
      <div class="square">

         @auth
            @if($isAdmin)
               <a onclick="openChange({{$note->id}})" class="leftmar button">Изменить</a>
               <a href="{{ route('delete-post', $note->id) }}" class="button">Удалить</a>
            @endif
         @endauth 

         @isset($note->filename)
            <img src="{{ asset('/storage/'. $note->filename) }}" alt="articleImage" class="mask">
         @endisset
         <h1 id="header_{{$note->id}}" class="h1 leftmar">{{$note->header}}</h1>
         <p id="created_{{$note->id}}">{{$note->created_at}}</p>
         <p id="content_{{$note->id}}">{{$note->content}}</p>
         
         {{-- Для комментариев --}}
         <h3 class="leftmar">Комментарии ></h3>
         <div id="comments_block_{{$note->id}}" class="leftmar rightmar comments_block" >
         </div>
         
         {{-- Загрузка комментариев --}}
         <script type="text/javascript">load_comments_to({{$note->id}});</script>

         @auth
            <a class="leftmar bottommar button" onclick="openModal({{$note->id}});">Оставить комментарий</a>
         @endauth
      </div>
   </div>
@endforeach

@isset($notes)
   {{$notes->links()}}
@endisset

@endsection