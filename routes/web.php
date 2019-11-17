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

Auth::routes();


Route::get('/', 'JobController@index')->name('jobs.index');

Route::name('jobs.')->prefix('jobs')->group(function () {

    Route::middleware('can:post-jobs')->group(function () {
        Route::get('new', 'JobController@create')->name('new');
        Route::post('new', 'JobController@store')->name('store');
    });

    Route::get('{job}', 'JobController@show')->name('show');
});

Route::name('users.')->prefix('users')->group(function () {

    Route::middleware('can:edit-users')->group(function () {
        Route::get('/', 'UserController@listNotApproved')->name('notApproved');
        Route::get('spam', 'UserController@listTrashed')->name('listTrashed');
        Route::patch('{user}', 'UserController@approve')->name('approve');
        Route::delete('{user}', 'UserController@destroy')->name('delete');
    });

    Route::middleware('signed')->name('mail.')->group(function () {
        Route::get('trash/{user}', 'UserController@destroy')->name('delete');
        Route::get('approve/{user}', 'UserController@approve')->name('approve');
    });
});











