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
        // echo Photo::FILENAMES;
        for ($i = 1; $i <= 15; $i++){
            echo '<figure>';
            echo    "<img src=\"img/icon_$i.png\" alt=\"icon_$i.png\" title=\"icon_$i.png\">";
            echo    "<figcaption> icon_$i </figcaption>";
            echo '</figure>';
        }
        echo '</div>';
    ?>
@endsection
