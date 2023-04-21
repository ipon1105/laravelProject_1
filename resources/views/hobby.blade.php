@extends('layout.base')

@section('title')
    Мои интересы
@endsection

@section('links')
    <link rel="stylesheet" type="text/css" href="{{ url('css/hobby.css') }}" >
@endsection

@section('body')
    <main>
        @foreach ($titleLists as $key => $value)
            <ul>
                <li>
                    <a href="#{{$key}}">{{$value}}</a>
                </li>
            </ul>
        @endforeach

        @foreach ($titleLists as $id => $contents)
            <h1 id="{{$id}}">{{$contents}}</h1>
            @foreach ($textLists[$id] as $key => $value)
                <h2>{{$key}}</h2>
                <p>{{$value}}</p>
            @endforeach
        @endforeach
    </main>
@endsection
