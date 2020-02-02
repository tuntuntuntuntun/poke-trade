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


Route::get('/', 'PostController@index')->name('posts.index');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/posts/create', 'PostController@showCreateForm')->name('posts.create');
    Route::post('/posts/create', 'PostController@create');
    
    Route::get('/mypage', 'MyPageController@showMyPage')->name('mypage');
    
    Route::group(['middleware' => 'can:view,post'], function() {
        Route::get('/posts/{post_id}/edit', 'PostController@showEditForm')->name('posts.edit');
        Route::post('/posts/{post_id}/edit', 'PostController@edit');
        
        Route::get('/posts/{post_id}/delete', 'PostController@showDeleteForm')->name('posts.delete');
        Route::post('/posts/{post_id}/delete', 'PostController@delete');
    });

});

Auth::routes();

