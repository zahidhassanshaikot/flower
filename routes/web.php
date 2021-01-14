<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(
    [
        'namespace'=>'App\Http\Controllers'
    ],
    function () {
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard')->middleware('auth');
        Route::get('/menu', 'DashboardController@menu')->name('menu')->middleware('auth');
        Route::get('/status-change/{id}', 'DashboardController@statusChange')->name('status-change')->middleware('auth');
        Route::get('/edit-menu/{id}', 'DashboardController@editMenu')->name('edit-menu')->middleware('auth');
        Route::post('/update-menu', 'DashboardController@updateMenu')->name('update-menu')->middleware('auth');
        Route::get('/menu/delete/{id}', 'DashboardController@deleteMenu')->name('menu-delete')->middleware('auth');
        Route::get('/user-list', 'UserController@userList')->name('user-list')->middleware('auth');
        Route::post('/save-new-menu', 'DashboardController@saveNewMenu')->name('save-new-menu')->middleware('auth');

        Route::post('/save-new-disease', 'DashboardController@saveNewDisease')->name('save-new-disease')->middleware('auth');
        Route::post('/save-new-treatment', 'DashboardController@saveNewTreatment')->name('save-new-treatment')->middleware('auth');
        Route::get('/disease-by-menu/{id}', 'DashboardController@diseaseByMenu')->name('disease-by-menu')->middleware('auth');
        Route::get('/treatment-by-disease/{id}', 'DashboardController@treatmentByDisease')->name('treatment-by-disease')->middleware('auth');
        Route::get('/disease-status-change/{id}', 'DashboardController@diseaseStatusChange')->name('disease-status-change')->middleware('auth');
        Route::get('/disease-delete/{id}', 'DashboardController@diseaseDelete')->name('disease-delete')->middleware('auth');
        
        Route::get('/treatment-delete/{id}', 'DashboardController@treatmentDelete')->name('treatment-delete')->middleware('auth');
        // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    });