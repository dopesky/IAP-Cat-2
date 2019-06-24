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

Route::get('/', function () {
    return view('kevin mwenda/landing');
});

Route::post('/', 'FeesController@specificFees');

Route::get('/student', function () {
    return view('kevin mwenda/student');
});

Route::get('/fees', 'FeesController@index');

Route::get('/all_fees','FeesController@allFees');



Route::post('/student','StudentController@insert');
Route::post('/fees','FeesController@insert');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
