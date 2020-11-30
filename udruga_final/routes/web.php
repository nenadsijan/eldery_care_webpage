<?php

Route::resource('path', 'MainController');
//login routes


Route::get('/', 'MainController@successlogin')->name('main');
Route::get('/admin', 'MainController@index');
Route::post('/main/checklogin', 'MainController@checklogin');
Route::get('main/logout', 'MainController@logout');

Route::resource('posts', 'MainController');
Route::group(['middleware' => 'admin'], function()
{	
	Route::resource('posts', 'MainController', ['only' => ['edit', 'update']]);
});
//routes for posts
Route::get('/createPost', 'MainController@create')->name('post.create')->middleware('admin');
Route::get('/delete/{id}', 'MainController@destroy')->name('post.delete')->middleware('admin');
Route::get('/posts/{id}', 'MainController@show')->name('post.show');
Route::post('/', 'MainController@sendMail')->name('email.send');

//routes for documents
Route::get('/createDocument', 'MainController@createDocument')->name('document.create')->middleware('admin');
Route::post('/createDocument', 'MainController@storeDocument')->name('document.store')->middleware('admin');
Route::get('/deleteDocument/{id}', 'MainController@destroyDocument')->name('document.delete')->middleware('admin');

Route::get('/editDocument/{id}', 'MainController@editDocument')->middleware('admin')->name('document.edit');
Route::post('/editDocument/{id}', 'MainController@updateDocument')->middleware('admin')->name('document.update');
