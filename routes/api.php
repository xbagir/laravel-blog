<?php

use App\Http\Middleware\MustBeAdmin;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//
Route::group([
    'namespace'  => 'Api',
    'middleware' => ['auth:api', MustBeAdmin::class]
], function () {
    Route::resource('articles', 'ArticleController');
    Route::resource('categories', 'CategoryController');
});