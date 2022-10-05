<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/user', [
    UserController::class,
    'testRequest'
])->middleware('test');


// show user ra,
// can use prefix but at this time, no need, everything is just simple as much as possible

Route::prefix('home')->name('home.')->group(function () {

    Route::get('/', [
        HomeController::class,
        'index'
    ])->name('index');

    Route::get('/{id}', [
        HomeController::class,
        'getDetail'
    ])->where('id', '[0-9]+')->name('detail');


    Route::get('/add', [
        HomeController::class,
        'addUser'
    ])->name('add');

    Route::post('/add', [
        HomeController::class,
        'addUserPost'
    ])->name('postAdd');;


    
    Route::get('/edit/{id}', [
        HomeController::class,
        'editUser'
    ])->name('edit');

    Route::post('/updated', [
        HomeController::class,
        'postEditUser'
    ])->name('postEdit');;
});


Route::get('/product', [
    ProductController::class,
    'index'
])->middleware('test');


Route::get('/product/{id}', [
    ProductController::class,
    'detail'
])->where('id', '[0-9]+');
