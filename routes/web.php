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

/**
 * Articles
 */
Route::get('/', 'ArticleController@index')->name('article.index');
Route::get('article/{id}/{slug}', 'ArticleController@show')->name('article.show');
Route::get('category/{id}/{slug}', 'CategoryController@show')->name('article.category');
Route::get('tag/{tag}', 'TagController@show')->name('article.tag');
Route::get('search', 'SearchController@show')->name('article.search');

Route::group(['middleware' => 'auth'], function () {
    Route::post('article/comment', 'ArticleCommentController@store')->name('article.comment.store');
    Route::post('discussion/comment', 'DiscussionCommentController@store')->name('discussion.comment.store');
});

/**
 *  Discussion
 */
Route::resource('discussion', 'DiscussionController', ['only' => [
    'index', 'show'
]]);

/*
 * Admin (JS Routing)
 */
Route::group(['prefix' => 'admin/dashboard', 'middleware' => ['auth']], function () {
    Route::get('{path?}', 'Admin\DashboardController@index')
        ->where('path', '[\/\w\.-]*')
        ->name('admin.dashboard');
});
