<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Отображение страниц для всех пользователей
Route::group([
    'controller' => IndexController::class,
    'as' => 'page.'
], function () {
    Route::get('/', 'home')->name('home');
    Route::get('/register', 'register')->name('register');
    Route::get('/login', 'login')->name('login');
    Route::get('/catalog', 'catalog')->name('catalog');
});


// Маршруты для авторизации на сайте
Route::group([
    'controller' => AuthController::class,
    'as' => 'auth.',
    'prefix' => '/auth'
], function () {
    Route::post('/create', 'createUser')->name('createUser');
    Route::post('/login', 'loginUser')->name('loginUser');
    Route::get('/logout', 'logoutUser')->name('logoutUser');
});



Route::group([
    'controller' => ProductController::class,
    'as' => 'product.',
    'prefix' => '/product'
], function () {
    Route::group([
        'middleware' => ['auth', AdminMiddleware::class]
    ], function () {
        Route::post('/create', 'createProduct')->name('createProduct');
    });
});


Route::group([
    'controller' => AdminController::class,
    'as' => 'admin.',
    'prefix' => '/admin',
    'middleware' => ['auth', AdminMiddleware::class]
], function () {
    Route::get('/', 'admin')->name('admin');

    // Страница с формой добавления товара
    Route::get('/product/create', 'createProduct')->name('createProduct');
});
