@extends('layout.base')

@section('links')
    <link rel="stylesheet" type="text/css" href="{{ url('css/album.css') }}" >
@endsection

@section('title')
    Фотоальбом
@endsection

@section('body')
    <main>
    <div class="grid-container">
        @foreach ($photos as $i)
            <figure>
                <img src="source/img/{{$i[0]}}" alt="{{$i[1]}}" title="{{$i[2]}}">
                <figcaption> {{$i[2]}} </figcaption>
            </figure>
        @endforeach
    </div>
    </main>
@endsection
