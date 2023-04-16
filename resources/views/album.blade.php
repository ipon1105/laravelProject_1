@extends('layout.base')

@section('links')
    <link rel="stylesheet" type="text/css" href="{{ url('css/album.css') }}" >
@endsection

@section('title')
    Фотоальбом
@endsection

@section('body')
    <?php 
        echo '<div class="grid-container">';
        
        // Подключаем массивы из модуля Photot
        $fn = Photo::FILENAMES;
        $an = Photo::ALTNAMES;
        $tn = Photo::TITLENAMES;

        for ($i = 0; $i < 15; $i++){
            echo '<figure>';
            echo    "<img src=\"source/img/{$fn[$i]}\" alt=\"{$an[$i]}\" title=\"{$tn[$i]}\">";
            echo    "<figcaption> {$tn[$i]} </figcaption>";
            echo '</figure>';
        }
        echo '</div>';
    ?>
@endsection
