<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RequestController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\Authenticate;
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
    Route::get('/cart', 'cart')->name('cart');
});

// Контроллер для добавления заявки
Route::group([
    'controller' => RequestController::class,
    'as' => 'request.',
], function () {
    // отправить заявку
    Route::post('/leaveRequest', 'leaveRequest')->name('leaveRequest');
});


// Маршруты для авторизации на сайте
Route::group([
    'controller' => AuthController::class,
    'as' => 'auth.',
    'prefix' => '/auth'
], function () {
    Route::post('/register', 'createUser')->name('createUser');
    Route::post('/login', 'loginUser')->name('loginUser');
    Route::get('/logout', 'logoutUser')->name('logoutUser');
});


// Страницы и функции в кабинете пользователя
Route::group([
    'controller' => AccountController::class,
    'as' => 'account.',
    'prefix' => '/account',
    'middleware' => ['auth', Authenticate::class]
], function () {
    // Страница личного кабинета
    Route::get('/', 'index')->name('index');
    // Страница с формой личных данных
    Route::get('/personal', 'personalData')->name('personalData');
    // изменить личные данные
    Route::post('/updateData', 'updateData')->name('updateData');
    // Страница смены пароля
    Route::get('/changePassword', 'changePassword')->name('changePassword');
    // сменить пароль
    Route::post('/updatePassword', 'updatePassword')->name('updatePassword');
});


// Страницы и функции в админке
Route::group([
    'controller' => AdminController::class,
    'as' => 'admin.',
    'prefix' => '/admin',
    'middleware' => ['auth', AdminMiddleware::class]
], function () {
    // Страница админ панель
    Route::get('/', 'index')->name('index');
    // Страница с формой личных данных
    Route::get('/personal', 'personalData')->name('personalData');
    // изменить личные данные
    Route::post('/updateData', 'updateData')->name('updateData');
//    // Страница смены пароля
//    Route::get('/changePassword', 'changePassword')->name('changePassword');
//    // сменить пароль
//    Route::post('/updatePassword', 'updatePassword')->name('updatePassword');
    // Страница с формой добавления товара
    Route::get('/product/create', 'createProduct')->name('createProduct');
    // Страница с формой добавления категории
    Route::get('/collection/create', 'createCollection')->name('createCollection');
    // Страница с пользователями
    Route::get('/users', 'showUsers')->name('showUsers');
    // Страница с продуктами
    Route::get('/products', 'showProducts')->name('showProducts');
    // Страница с заявками
    Route::get('/requests', 'showRequests')->name('showRequests');

    // Контроллер продукта
    Route::group([
        'controller' => ProductController::class,
        'as' => 'product.',
        'prefix' => '/product'
    ], function () {
        // добавить
        Route::post('/create', 'createProduct')->name('createProduct');
        // редактировать
        Route::post('/update/{product:id}', 'updateProduct')->name('updateProduct')->where('id', '[0-9]*');
    });

    // Контроллер категории
    Route::group([
        'controller' => CollectionController::class,
        'as' => 'collection.',
        'prefix' => '/collection'
    ], function () {
        // добавить
        Route::post('/create', 'createCollection')->name('createCollection');
    });
});


// Контроллер продукта
Route::group([
    'controller' => ProductController::class,
    'as' => 'product.',
    'prefix' => '/product'
], function () {
    // Страница одного продукта
    Route::get('/{product:id}', 'show')->name('show')->where('id', '[0-9]*');
});
