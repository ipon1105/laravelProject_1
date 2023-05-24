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

<script type="text/javascript">
   document.getElementById('close_btn').onclick = closeModal;

   function closeModal(){
      var modal = document.getElementById('modalWin');
      modal.classList.remove("show");
   }

   function openModal(){
      var modal = document.getElementById('modalWin');
      modal.classList.add("show");
   }

   let add_url = '/blog/comments/add';
   let load_url = '/blog/comments/load';
   var noteID = 1;

   // Загрузка комментариев для записи по id
   function load_comments_from(note_id)
   {
      fetch(load_url + '/' + note_id)
         .then(response => response.text())
         .then(data => {
            if (data == 'fail'){
               console.log('Для записи с id = ' + note_id + ' нет записей.' );
               return;
            }
            
            let parser = new DOMParser();
            let xmlDom = parser.parseFromString(data, "application/xml");
            let comments = xmlDom.querySelectorAll('comment');

            comments.forEach(element => {
               var comment = document.createElement("div");
               var classattrib = "inset 12px 222px 2px 2px rgba(1,2,111,11)";
               comment.style.boxShadow = classattrib;
               
               var date = document.createElement("p");
               var name = document.createElement("p");
               var content = document.createElement("p");
               
               date.appendChild(document.createTextNode(""));
               name.appendChild(document.createTextNode("name"));
               content.appendChild(document.createTextNode("content"));
               
               comment.appendChild(date);
               comment.appendChild(name);
               comment.appendChild(content);

               (document.getElementById('comments_block')).appendChild(comment);
            });
            
            
         })
         .catch(console.error);
   }

   function setNoteId(id){
      noteID = id;
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
         })
         .catch(console.error);
   }
   
</script>

@foreach ($notes as $note)
   <div class="container leftmar rightmar topmar">
      <div class="square">
      @isset($note->filename)
         <img src="{{ asset('/storage/'. $note->filename) }}" alt="articleImage" class="mask">
      @endisset
      <div class="h1 leftmar">{{$note->header}}</div>
      <p>{{$note->content}}</p>
      <p>{{$note->created_at}}</p>
      
      {{-- Для комментариев --}}
      <h3 class="leftmar">Комментарии ></h3>
      <div class="leftmar rightmar" id="comments_block" >
         {{-- Загрузка комментариев --}}
         <script type="text/javascript">load_comments_from({{$note->id}});</script>
      </div>

      @auth
         <a class="leftmar bottommar button" onclick="setNoteId({{$note->id}}); openModal();">Оставить комментарий</a>
      @endauth
   </div>
@endforeach

@isset($notes)
   {{$notes->links()}}
@endisset

@endsection