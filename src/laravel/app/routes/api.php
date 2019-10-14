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

// api/user にget でアクセスした場合、apiの中のauthミドルウェアを実行し、
// function の中身を実行して返す
//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

// api/login にアクセスした場合、function の中を返す
//Route::get('/login', [ 'as' => 'login', 'uses' => function(Request $request){
//    echo "aaagfa";
//}]);



// 確認用
Route::get('/sample/hello', "Sample\SampleController@hello");
Route::get('/sample/phpinfo', "Sample\SampleController@phpinfo");
Route::get('/sample/env', "Sample\SampleController@env");
Route::get('/sample/cache', "Sample\SampleController@cache");
Route::get('/sample/memcached', "Sample\SampleController@memcached");
Route::get('/sample/db', "Sample\SampleController@db");
Route::get('/sample/cookie', "Sample\SampleController@cookie");
Route::get('/sample/cookie_facade', "Sample\SampleController@cookieFacade");
Route::get('/sample/session_id', "Sample\SampleController@sessionId");
Route::get('/sample/session', "Sample\SampleController@session");

Route::get('/sample/user', "Sample\SampleController@user");
Route::get('/sample/login', "Sample\SampleController@login");
