<?php

use Illuminate\Http\Request;

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


Route::post('/register', 'RegisterController@register');

// Route::middleware('auth:api')->group( function(){
//   Route::post('/topics', 'TopicController@store');
//   Route::get('/topics', 'TopicController@index');
//   Route::get('topics/{topic}', 'TopicController@show');
//   Route::get('/topics', 'TopicController@index');
//   Route::patch('topics/{topic}', 'TopicController@update');
//   Route::delete('topics/{topic}', 'TopicController@destroy');
//
// });


Route::prefix('topics')->group( function(){
  Route::middleware('auth:api')->post('/', 'TopicController@store');
  Route::middleware('auth:api')->get('/{topic}', 'TopicController@show');
  Route::middleware('auth:api')->patch('/{topic}', 'TopicController@update');
  Route::middleware('auth:api')->delete('/{topic}', 'TopicController@destroy');
  Route::get('/', 'TopicController@index');

  Route::prefix('/{topic}/posts')->group(function(){
    Route::middleware('auth:api')->post('/', 'PostController@store');
    Route::middleware('auth:api')->patch('/{post}', 'PostController@update');
    Route::middleware('auth:api')->delete('/{post}', 'PostController@destroy');

    //likes
      Route::prefix('/{post}/likes')->group(function(){
        Route::middleware('auth:api')->post('/', 'PostLikeController@store');
      });
  });
});
