<?php
use Illuminate\Support\Facades\Route;

//Frontend Route
Route::get('/', 'Frontend\FrontendController@index');

//Backend Route
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
// Users Route
Route::prefix('users')->group(function () {
Route::get('/view', 'Backend\UserController@view')->name('users.view');
Route::get('/add', 'Backend\UserController@add')->name('users.add');
Route::post('/store', 'Backend\UserController@store')->name('users.store');
Route::get('/edit/{id}', 'Backend\UserController@edit')->name('users.edit');
Route::post('/update/{id}', 'Backend\UserController@update')->name('users.update');
Route::get('/delete/{id}', 'Backend\UserController@delete')->name('users.delete');

});

// Users Profile Route
Route::prefix('profiles')->group(function () {
Route::get('/view', 'Backend\ProfileController@view')->name('profiles.view');
Route::get('/edit', 'Backend\ProfileController@edit')->name('profiles.edit');
Route::post('/update', 'Backend\ProfileController@update')->name('profiles.update');
Route::get('/password/view', 'Backend\ProfileController@passwordView')->name('profiles.password.view');
Route::post('/password/update', 'Backend\ProfileController@passwordUpdate')->name('profiles.password.update');

});



});


