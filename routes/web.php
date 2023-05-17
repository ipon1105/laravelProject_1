<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
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
Route::get('/guess/all',[GuessController::class,    'all'] )->name('guess-all');
Route::get('/blog',     [BlogController::class,     'show'])->name('blog');
Route::get('/blog/view/{page}', [BlogController::class,     'index'] )->name('blog-index');
Route::get('/blog/edit',[BlogEditController::class, 'show'])->name('blog-edit');

Route::post('/contact/submit',      [ContactController::class,  'submit'])->name('contact-form');
Route::post('/test/submit',         [TestController::class,     'submit'])->name('test-form');
Route::post('/guess/submit/add',    [GuessController::class,    'add']   )->name('guess-form-add');
Route::post('/guess/submit/load',   [GuessController::class,    'load']  )->name('guess-form-load');
Route::post('/blog/edit/submit',    [BlogEditController::class, 'submit'])->name('blog-edit-form');
Route::post('/blog/submit',         [BlogController::class,     'submit'])->name('blog-form');

