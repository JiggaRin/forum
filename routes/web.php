<?php

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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// Проверка верифицирован ли пользователь, для допуска на страничку home
Auth::routes(['verify'=> true]);
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::group(['namespace' => 'Blog', 'prefix' => 'blog'], function () {      //Путь к вызову метода @index
    Route::resource('posts', 'PostController')->names('blog.posts');
});

// Админка Блога
$groupData = [
    'namespace' => 'Blog\Admin',
    'prefix'    => 'admin/blog',
    'middleware'=> 'verified',
];
Route::group($groupData, function () {
    //BlogCategory
    $methods = ['index', 'edit', 'update', 'create', 'store',];
    Route::resource('categories', 'CategoryController') // Создание ресурсного маршрута
        ->only($methods)
        ->names('blog.admin.categories');

    // BlogPost
    Route::resource('posts', 'PostController')
        ->except(['show'])
        ->names('blog.admin.posts');
});
