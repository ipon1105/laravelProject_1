@extends('layout.blogbase')

@section('links')
   <link rel="stylesheet" type="text/css" href="{{ url('css/aricle.css') }}" >
@endsection

@section('title')Библиотека записей@endsection

@section('body')
<div class="center">  
   @if ($pages)
      <div class="leftmar topmar">
      @foreach ($pages as $num => $page)
         <a href="{{route('blog-index', $num)}}"> {{ $page }}</a>
      @endforeach
      </div>
   @endif
</div>

@if($notes)
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
   </div>
   @endforeach
@endif
@endsection