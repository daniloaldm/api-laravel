<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/v1')->group(function () {
    Route::get('posts', 'PostsController@show');
    Route::get('posts?tag={tag_name}', 'TagsController@getTagByname');

    Route::post('posts', 'PostsController@register');
    
    Route::put('posts/{post_id}', 'PostsController@update');
    
    Route::delete('posts/{post_id}', 'PostsController@delete');
});