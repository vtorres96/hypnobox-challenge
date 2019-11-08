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
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::middleware(['auth'])->group(function (){

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/contacts', 'ContactController@index')->name('contacts-index');

    Route::get('/contacts/create', 'ContactController@create')->name('contacts-create');

    Route::get('/contacts/edit/{id}', 'ContactController@edit')->name('contacts-edit');

    Route::delete('/contacts/remove/{id}', 'ContactController@destroy');

});
