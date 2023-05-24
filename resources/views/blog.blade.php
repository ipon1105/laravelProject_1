@extends('layout.blogbase')

@section('links')
<link rel="stylesheet" type="text/css" href="{{ url('css/modal.css') }}" >
@endsection

@section('title')Библиотека записей@endsection

@section('body')
 {{-- Модальное окно --}}
<div id="modalWin" class="modal">
   <div class="modal-window">
      <form method="POST" onsubmit="onsubmitForm(this)">
         @csrf
         <p>Комментарий ></p><br>
         <textarea class="leftmar" id="comment" name="comment" rows="5"></textarea><br>
         <button class="button topmar leftmar bottommar" type="submit">Отправить</a>
         <button class="btn-close" data-easy-toggle="#modalWin" data-easy-class="show">X</button>
      </form>
   </div>
   <div class="overlay" data-easy-toggle="#modalWin" data-easy-class="show"></div>
</div>

<script type="text/javascript">
   // Загрузка комментариев для записи по id
   function load_comments_from(note_id){
      console.log("read from note id = " + note_id);

      fetch('/blog/comments/load/' + note_id)
         .then(response => response.text())
         .then(data => {
            console.log('data = ' + data);
            if (data == 'fail'){
               alert('Ошибка загрузки комментариев для записи ' + note_id);
               return;
            }

            const parser = new DOMParser();
            const xml = parser.parseFromString(data, "application/xml");
            console.log(xml);
            
            var comment = document.createElement("div");
            var classattrib = "inset 12px 222px 2px 2px rgba(1,2,111,11)";
            comment.style.boxShadow = classattrib;
            
            var date = document.createElement("p");
            var name = document.createElement("p");
            var content = document.createElement("p");

            date.appendChild(document.createTextNode("date"));
            name.appendChild(document.createTextNode("name"));
            content.appendChild(document.createTextNode("content"));
            
            comment.appendChild(date);
            comment.appendChild(name);
            comment.appendChild(content);

            (document.getElementById('comments_block')).appendChild(comment);
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
         <a class="leftmar bottommar button" data-easy-toggle="#modalWin" data-easy-class="show" onclick="setNoteId({{$note->id}})">Оставить комментарий</a>
      @endauth
   </div>


@endforeach

@isset($notes)
   {{$notes->links()}}
@endisset

<script>
   /**
 * EasyToggler 1.1.0
 * Simple class switcher on web elements. JavaScript only.
 * GitHub: https://github.com/rah-emil/easy-toggler
 *
 * Copyright 2020 Rah Emil
 *
 * Released under the MIT License
 *
 * Released: July 21, 2020
 * Latest updates: August 01, 2020
 */

(function(){
   'use strict';
   
   document.addEventListener('click', EasyTogglerHandler);
   
   function EasyTogglerHandler(event){
      const EY_BTN=event.target.closest('[data-easy-toggle]');
      
      if(EY_BTN){
         event.preventDefault();
         let ey_target=EY_BTN.getAttribute('data-easy-toggle');
         let ey_class=EY_BTN.getAttribute('data-easy-class');
         try{
            document.querySelector(ey_target).classList.toggle(ey_class)
         }catch(ey_error){
            console.warn('EasyToggler.js : Блок '+ey_target+' не существует')
         }
      }

      if(!EY_BTN){
         let ey_rcoe_block_targets=document.querySelectorAll('[data-easy-rcoe]');
         Array.from(ey_rcoe_block_targets).forEach.call(ey_rcoe_block_targets,function(ey_rcoe_block_target){
            let ey_rcoe_block=ey_rcoe_block_target.getAttribute('data-easy-toggle'),ey_rcoe_block_class=ey_rcoe_block_target.getAttribute('data-easy-class');
            
            if(!event.target.closest(ey_rcoe_block)){
               try{
                  document.querySelector(ey_rcoe_block).classList.remove(ey_rcoe_block_class)
               }catch(ey_error){
                  console.warn('EasyToggler.js : Блок '+ey_rcoe_block+' не существует')
               }
            }
         })
      }
   }
})()
</script>
         
<script  type="text/javascript">
   const let url = '/blog/comments/add';
   var noteID = 1;

   function setNoteId(id){
      noteID = id;
   }

   function onsubmitForm(form){
      var formData = new FormData(form);
      formData.append("note_id", noteID);

      var options = {
         method: 'post',
         body: formData,
      }

      fetch(url, options)
      .then(data => {
         console.log('1');
         data.text();
      })
      .then(result => {
         alert("good" + result.text());
      }).catch(console.error);
   }

</script>

@endsection