<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//})->name('welcome');
//
//Route::prefix('customer')->group(function () {
//    Route::get('index', function () {
//        return view('modules.customer.index');
//    });
//
//    Route::get('create', function () {
//        // Hien thi form tao khach hang
//        return view('modules.customer.create');
//    });
//
//    Route::post('store', function () {
//        // Xu ly luu du lieu khach hang thong qua method POST cua form
//        return view('modules.customer.store');
//    });
//
//    Route::get('{id}/show', function ($id) {
//        // Hien thi chi tiet khach hang theo ma dinh danh id
//        return "Khach hang so ${id}";
//    })->name('customer.show');
//
//    Route::get('/edit/{id}', function ($id) {
//        // Hien thi form chinh sua thong tin khach hang
//    });
//
//    Route::patch('/update/{id}', function ($id) {
//        // Xu ly du lieu thong tin khach hang duoc chinh sua thong qua method PATCH cua form
//    });
//
//    Route::delete('/{id}', function () {
//        // Xoa thong tin du lieu khach hang
//    });
//});

//Route::resource('customers', 'CustomerController');
//
//Route::prefix('tasks')->group(function() {
//    Route::get('index', function () {
//        return view('tasks.index');
////        Hien thi danh sach tasks
//    });
//
//    Route::get('create', function () {
//        // Hien thi form tao moi task
//    });
//
//    Route::post('store', function () {
//        // Xu ly tao form tu method Post cua form
//    });
//
//    Route::get('{id}/show', function ($id) {
//        // Hien thi thong tin chi tiet task theo id
//    });
//
//    Route::get('{id}/edit', function ($id) {
//        // Hien thi form chinh sua chi tiet task theo id
//    });
//
//    Route::patch('{id}/update', function ($id) {
//        // Xu ly thay doi du lieu task qua method PATCH cua form
//    });
//
//    Route::delete('{id}', function ($id) {
//        // xoa du lieu cua task theo id
//    });
//});
//
//Route::resource('tasks', 'TaskController');

//Route::group(['prefix' => 'customers'], function () {
//    Route::get('/', 'CustomerController@index')->name('customers.index');
//});
//
//Route::get('welcome', function () {
//    return view('welcome');
//})->name('welcome');
//
//Route::get('/tasks', 'TaskController@index')->name('tasks.index');
//
//Route::get('/tasks/create', 'TaskController@create')->name('tasks.create');
//
//Route::post('/tasks', 'TaskController@store')->name('tasks.store');
Route::get('/', function () {
    return view('home');
});

Route::group(['prefix' => 'tasks'], function() {
    Route::get('/', 'TaskController@index')->name('tasks.index');
    Route::get('/create', 'TaskController@create')->name('tasks.create');
    Route::post('/create', 'TaskController@store')->name('tasks.store');
    Route::get('{id}/edit', 'TaskController@edit')->name('tasks.edit');
    Route::post('{id}/edit', 'TaskController@update')->name('tasks.update');
    Route::get('{id}/destroy', 'TaskController@destroy')->name('tasks.destroy');
});
