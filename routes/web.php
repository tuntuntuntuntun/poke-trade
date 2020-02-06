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

Route::get('/posts/search', 'PostController@showSearchForm')->name('posts.search');

Route::get('/posts/{post}/detail', 'PostController@showDetail')->name('posts.detail');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/posts/create', 'PostController@showCreateForm')->name('posts.create');
    Route::post('/posts/create', 'PostController@create');
    
    Route::get('/posts/{post}/comment/create', 'CommentController@showCreateForm')->name('comments.create');
    Route::post('/posts/{post}/comment/create', 'CommentController@create');

    Route::get('/mypage', 'MyPageController@showMyPage')->name('mypage');


    
    Route::group(['middleware' => 'can:view,post'], function() {
        Route::get('/posts/{post}/edit', 'PostController@showEditForm')->name('posts.edit');
        Route::post('/posts/{post}/edit', 'PostController@edit');
        
        Route::get('/posts/{post}/delete', 'PostController@showDeleteForm')->name('posts.delete');
        Route::post('/posts/{post}/delete', 'PostController@delete');
    });

    Route::group(['middleware' => 'can:view,comment'], function() {
        Route::get('/posts/{post}/comments/{comment}/edit', 'CommentController@showEditForm')->name('comments.edit');
        Route::post('/posts/{post}/comments/{comment}/edit', 'CommentController@edit');

        Route::get('/posts/{post}/comments/{comment}/delete', 'CommentController@showDeleteForm')->name('comments.delete');
        Route::post('/posts/{post}/comments/{comment}/delete', 'CommentController@delete');
    });
});

Auth::routes();
