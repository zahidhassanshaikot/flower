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
Route::group(
    [
        'middleware' => 'api',
        'prefix' => 'v1.0',
        'namespace'=>'App\Http\Controllers'
    ],
    function()
    {
    Route::post('register', 'ApiController@register');
    Route::post('login', 'ApiController@authenticate');
    Route::get('menu', 'ApiController@menuList');

    Route::post('menu/disease/{id}', 'ApiController@diseaseByMenu');
    Route::post('menu/disease/treatment/{menu_id}/{disease_id}', 'ApiController@treatmentByDisease');

    Route::group(['middleware' => ['jwt.verify']], function() {

            Route::get('me', 'ApiController@getAuthenticatedUser');
            Route::get('logout', 'ApiController@logout');
            Route::post('change-password', 'ApiController@changePassword');
            Route::post('update/{id}', 'ApiController@updateUserInfo');
    });
});

Route::get('test', 'App\Http\Controllers\ApiController@test');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

