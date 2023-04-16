@extends('layout.base')

@section('title')
    Главная
@endsection

@section('links')
    <style>
        body main article div p {
            padding-top: 5%;
            padding-left: 5%;
        }

        img {
            width: 30%;
            height: 30%;
            float: left;
            border: 10px solid #ffffff;
        }
    </style>
@endsection

@section('body')
    <main>
        <div>
            <img src="source/img/image_1.jpg" alt="Изображение меня">
            <br>ФИО: Коновалов Иван Викторович.
            <br>Группа: ПИ/Б-20-1-о.
            <br>Лабораторная работа номер 8:
            </div>
    </main>
@endsection
