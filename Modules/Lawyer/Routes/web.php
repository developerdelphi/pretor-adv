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

use Modules\Lawyer\Http\Controllers\AreasController;

Route::prefix('lawyer')->group(function() {
    Route::group(['middleware' => ['auth']], function () {
        Route::get('/', 'LawyerController@index');
        Route::resource('areas', 'AreasController');
        Route::resource('entities', 'EntitiesController');
        Route::resource('kinds', 'KindsController');
        Route::resource('processes', 'ProcessesController');
    });
});

Route::get('areas/search','AreasController@search')->name('areas.search');
