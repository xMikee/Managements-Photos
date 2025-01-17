<?php

use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('welcome');
});
Route::get('/hello/{param}', function ($param) {
    return 'hello PARAM: '.$param;
});

/*Route::get('/create-customer/{param}', function ($param) {
    $model = [
        'name' => 'Ciccio',
        'email' => 'ciccio@example.it',
        'password' => 'test',
        'created_at' => '',
        'updated_at' => 'test',
        'param' => $param
    ];
    return view('create-customer',$model);
});

Route::get('/create-customer/{param1}/{param2}','App\Http\Controllers\CreateAccountController@execute');
Route::get('/create-customer','App\Http\Controllers\CreateAccountController@index');*/

//Route::resource('photos','App\Http\Controllers\Admin\PhotoController');
Route::get('/', function () {
    return view('index');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->middleware('auth')->group(function (){
    Route::resource('photos','PhotoController');
});
