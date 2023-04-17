@extends('layout.base')

@section('title')
    Мои интересы
@endsection

@section('links')
    <link rel="stylesheet" type="text/css" href="{{ url('css/hobby.css') }}" >
@endsection

@section('body')
    <main>
    <?php 
        $titles = Interest::TITLELIST;
        $texts  = Interest::TEXTLIST;

        // Фукнция для отрисовки Содержания
        function contents($titles){
            echo "<ul>";
            foreach ($titles as $key => $value) {
                echo "<li>";
                echo    "<a href=\"#$key\">$value</a>";
                echo "</li>";
            }
            echo "</ul>";
        }

        // Фукнция для отрисовки содержимого
        function content_($titles, $texts){
            foreach ($titles as $id => $contents) {
                echo "<h1 id=\"$id\">$contents</h1>";

                foreach ($texts[$id] as $key => $value){
                    echo "<h2>$key</h2>";
                    echo "<p>$value</p>";
                }
            }
        }
        
        contents($titles);
        content_($titles, $texts);
    ?>
    </main>
@endsection
