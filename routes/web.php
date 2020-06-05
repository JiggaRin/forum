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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['namespace' => 'Blog', 'prefix' => 'blog'], function () {      //Путь к вызову метода @index
    Route::resource('posts', 'PostController')->names('blog.posts');
});

$groupData = [
    'namespace' => 'Blog\Admin',
    'prefix'    => 'admin/blog',
];
Route::group($groupData, function () {
    //BlogCategory
    $methods = ['index', 'edit', 'update', 'create', 'store',];
    Route::resource('categories', 'CategoryController') // Создание ресурсного маршрута
        ->only($methods)
        ->names('blog.admin.categories');
});

//Route::resource('rest', 'RestTestController')->names('restTest');
