@extends('layout.blogbase')

@section('links')
<link rel="stylesheet" type="text/css" href="{{ url('css/aricle.css') }}" >
<link rel="stylesheet" type="text/css" href="{{ url('css/modal.css') }}" >
@endsection

@section('title')Библиотека записей@endsection


@section('body')
<div id="modalWin" class="modal">
   <div class="modal-window">
      МОДАЛЬНОЕ ОКНО

      <button class="btn-close" data-easy-toggle="#modalWin" data-easy-class="show">X</button>
   </div>

   <div class="overlay" data-easy-toggle="#modalWin" data-easy-class="show"></div>
</div>
<script>
   
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
   </div>
   @isset($comments)   
      @foreach ($comments as $comment)
         <div class="topmar">
            <p>Дата и время: {{$comment->created_at}}</p>
            <p>Автор: {{$comment->author}}</p>
            <p>Содержание: {{$comment->content}}</p>
         </div>
      @endforeach
   @endisset
   @auth
      <a class="leftmar button" data-easy-toggle="#modalWin" data-easy-class="show">Оставить комментарий</a>
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

(function(){'use strict';document.addEventListener('click',EasyTogglerHandler);function EasyTogglerHandler(event){const EY_BTN=event.target.closest('[data-easy-toggle]');if(EY_BTN){event.preventDefault();let ey_target=EY_BTN.getAttribute('data-easy-toggle');let ey_class=EY_BTN.getAttribute('data-easy-class');try{document.querySelector(ey_target).classList.toggle(ey_class)}catch(ey_error){console.warn('EasyToggler.js : Блок '+ey_target+' не существует')}}if(!EY_BTN){let ey_rcoe_block_targets=document.querySelectorAll('[data-easy-rcoe]');Array.from(ey_rcoe_block_targets).forEach.call(ey_rcoe_block_targets,function(ey_rcoe_block_target){let ey_rcoe_block=ey_rcoe_block_target.getAttribute('data-easy-toggle'),ey_rcoe_block_class=ey_rcoe_block_target.getAttribute('data-easy-class');if(!event.target.closest(ey_rcoe_block)){try{document.querySelector(ey_rcoe_block).classList.remove(ey_rcoe_block_class)}catch(ey_error){console.warn('EasyToggler.js : Блок '+ey_rcoe_block+' не существует')}}})}}})()
</script>

@endsection