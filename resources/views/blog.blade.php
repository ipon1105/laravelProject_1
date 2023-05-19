@extends('layout.blogbase')

@section('links')
   <link rel="stylesheet" type="text/css" href="{{ url('css/aricle.css') }}" >
@endsection

@section('title')Библиотека записей@endsection


@section('body')

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
      <a class="leftmar button">Оставить комментарий</a>
   @endauth
   

 </div>
 @endforeach

@isset($notes)
   {{$notes->links()}}
@endisset

@endsection