<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    // Массив имён файлов для страницы ФОТОАЛЬБОМ
    const FILENAMES = [
        'icon_1.png',
        'icon_2.png',
        'icon_3.png',
        'icon_4.png',
        'icon_5.png',
        'icon_6.png',
        'icon_7.png',
        'icon_8.png',
        'icon_9.png',
        'icon_10.png',
        'icon_11.png',
        'icon_12.png',
        'icon_13.png',
        'icon_14.png',
        'icon_15.png',
    ];

    // Массив сообщений описывающих файл
    const ALTNAMES = [
        'icon_1',
        'icon_2',
        'icon_3',
        'icon_4',
        'icon_5',
        'icon_6',
        'icon_7',
        'icon_8',
        'icon_9',
        'icon_10',
        'icon_11',
        'icon_12',
        'icon_13',
        'icon_14',
        'icon_15',
    ];

}
