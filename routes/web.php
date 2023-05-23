<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HobbyController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\StudyController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\GuessController;
use App\Http\Controllers\BlogEditController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AdminStatisticController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminRegisterController;
use App\Http\Controllers\AdminLogoutController;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\UserRegistrationController;

use App\Models\Comment;

Route::get('/',         [AboutController::class,    'show']);
Route::get('/about',    [AboutController::class,    'show'])->name('about');
Route::get('/contact',  [ContactController::class,  'show'])->name('contact');
Route::get('/history',  [HistoryController::class,  'show'])->name('history');
Route::get('/home',     [HomeController::class,     'show'])->name('home');
Route::get('/hobby',    [HobbyController::class,    'show'])->name('hobby');
Route::get('/album',    [AlbumController::class,    'show'])->name('album');
Route::get('/study',    [StudyController::class,    'show'])->name('study');
Route::get('/test',     [TestController::class,     'show'])->name('test');
Route::get('/guess',    [GuessController::class,    'show'])->name('guess');
Route::get('/blog',     [BlogController::class,     'show'])->name('blog');
Route::get('/blog/edit',[BlogEditController::class, 'show'])->middleware('auth')->name('blog-edit');

Route::post('/contact/submit',      [ContactController::class,  'submit'])->name('contact-form');
Route::post('/test/submit',         [TestController::class,     'submit'])->name('test-form');
Route::post('/guess/submit/add',    [GuessController::class,    'add']   )->name('guess-form-add');
Route::post('/guess/submit/load',   [GuessController::class,    'load']  )->name('guess-form-load');
Route::post('/blog/load',           [BlogEditController::class, 'load'])->name('blog-form');
Route::post('/blog/edit/submit',    [BlogEditController::class, 'submit'])->middleware('auth')->name('blog-edit-form');

Route::get ('/admin',       [AdminController::class,    'show'])->middleware('auth')->name('admin');
Route::post('/admin/add',   [AdminController::class,    'add'] )->middleware('auth')->name('admin-add-form');
Route::post('/admin/load',  [AdminController::class,    'load'])->middleware('auth')->name('admin-load-form');

Route::get('/admin/statistics',  [AdminStatisticController::class,    'show'])->middleware('auth')->name('admin-statistic');

// Авторизация
Route::get('/admin/login',           [AdminLoginController::class,    'show'])  ->name('login');
Route::post('/admin/login/submit',   [AdminLoginController::class,    'submit'])->name('login-submit');
Route::get('/user/login',            [UserLoginController::class,    'show'])  ->name('user-login');
Route::post('/user/login/submit',    [UserLoginController::class,    'submit'])->name('user-login-submit');

// Регистрация
Route::get('/admin/registration',           [AdminRegisterController::class, 'show'])  ->name('registration');
Route::post('/admin/registration/submit',   [AdminRegisterController::class, 'submit'])->name('registration-submit');
Route::get('/user/registration',            [UserRegistrationController::class, 'show'])  ->name('user-registration');
Route::post('/user/registration/submit',    [UserRegistrationController::class, 'submit'])->name('user-registration-submit');

// Выход
Route::get('/logout', [AdminLogoutController::class,    'logout'])->middleware('auth')->name('logout');

Route::get('/getLogin/{login}', function($login){
    $message = [
        'empty'=> false, 
        'status' => 'Ошибка',
        'message' => 'Такой пользователь уже существует',
    ];
    $message['empty'] = (User::where('email', '=', $login)->first() == null);

    return response()->json($message);
});

// Загрузить комментарии для поста id
Route::get('/blog/comments', function($id) {
    $comments = Comment::all();
    
    $xml = new XMLWriter();
    $xml->openMemory();
    $xml->startDocument();
    $xml->startElement('comments');
    /*
    $xml = new XMLWriter();
    $xml->openMemory();
    $xml->startDocument();
    $xml->startElement('users');
    foreach($users as $user) {
        $xml->startElement('data');
        $xml->writeAttribute('id', $user->id);
        $xml->writeAttribute('firstname', $user->firstname);
        $xml->writeAttribute('lastname', $user->lastname);
        $xml->writeAttribute('email', $user->email);
        $xml->endElement();
    }
    $xml->endElement();
    $xml->endDocument();

    $content = $xml->outputMemory();
    $xml = null;

    return response($content)->header('Content-Type', 'text/xml');
    */
    return 'hi';
});