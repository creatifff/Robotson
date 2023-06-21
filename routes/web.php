<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\OrderController;
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
    // Страница с заказами
    Route::get('/orders', 'orders')->name('orders');
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
    // Страница с формой добавления товара
    Route::get('/product/create', 'createProduct')->name('createProduct');
    // Страница с редактированием продукта
    Route::get('/product/update/{product:id}', 'updateProduct')->name('updateProduct');
    // Страница с формой добавления категории
    Route::get('/collection/create', 'createCollection')->name('createCollection');
    // Страница с редактированием категории
    Route::get('/collection/update/{collection:id}', 'updateCollection')->name('updateCollection');
    // Страница с пользователями
    Route::get('/users', 'showUsers')->name('showUsers');
    // Страница с продуктами
    Route::get('/products', 'showProducts')->name('showProducts');
    // Страница с категориями
    Route::get('/collections', 'showCollections')->name('showCollections');
    // Страница с заявками
    Route::get('/requests', 'showRequests')->name('showRequests');
    // Страница с заказами
    Route::get('/orders', 'showOrders')->name('showOrders');

    // Контроллер продукта
    Route::group([
        'controller' => ProductController::class,
        'as' => 'product.',
        'prefix' => '/product'
    ], function () {
        // добавить
        Route::post('/create', 'createProduct')->name('createProduct');
        // редактировать
        Route::put('/update/{product:id}', 'updateProduct')->name('updateProduct')->where('id', '[0-9]*');
        // удалить
        Route::delete('/delete/{product:id}', 'deleteProduct')->name('deleteProduct');
        // просмотра продукта в админке
        Route::get('/{product:id}', 'show')->name('show')->where('id', '[0-9]*');

    });

    // Контроллер категории
    Route::group([
        'controller' => CollectionController::class,
        'as' => 'collection.',
        'prefix' => '/collection'
    ], function () {
        // добавить
        Route::post('/create', 'createCollection')->name('createCollection');
        // редактировать
        Route::put('/update/{collection:id}', 'updateCollection')->name('updateCollection')->where('id', '[0-9]*');
        // удалить
        Route::delete('/delete/{collection:id}', 'deleteCollection')->name('deleteCollection');
    });

    // Контроллер заказа
    Route::group([
        'controller' => OrderController::class,
        'as' => 'order.',
        'prefix' => '/order',
    ], function () {
        Route::delete('/delete/{order:id}', 'deleteOrder')->name('deleteOrder');
        Route::get('/toggle/{order:id}', 'changeStatus')->name('toggle');
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
    // добавить в корзину
    Route::get('/{id}/addToCart', 'addToCart')->name('addToCart')->where('id', '[0-9]*');
});


// Контроллер корзины
Route::group([
    'controller' => CartController::class,
    'as' => 'cart.',
    'prefix' => '/cart'
], function () {
    Route::get('/', 'index')->name('index');
    Route::get('/{product:id}/remove', 'remove')->name('remove');
    Route::get('/clear', 'clear')->name('clear');

    Route::group([
        'controller' => ProductController::class,
        'as' => 'product.',
        'prefix' => '/product'
    ], function () {
        Route::get('/{id}', 'show')->name('show')->where('id', '[0-9]*');
    });

    Route::get('/checkout', 'checkoutIndex')->middleware('auth')->name('checkoutIndex');
    Route::get('/createOrder', 'createOrder')->middleware('auth')->name('createOrder');
    Route::post('/create/checkout', 'checkout')->middleware('auth')->name('checkout');

});
