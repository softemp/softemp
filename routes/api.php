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

Route::get('/user', function (\App\Http\Controllers\SoftEmp\Api\V1\EmployeeController $employee) {
    return $employee->index();
});

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group(['prefix' => '/v1/zlr5y213', 'namespace' => 'SoftEmp\Panel\Provedor',], function () {
// Bloqueio de clientes do MkAuth
    Route::group(['prefix' => '/mkblock', 'as' => 'mkblock.'], function () {
        //Route::get('/', 'MkBlockController@sincLoginBlock')->name('sincLoginBlock');
        Route::get('/unlockClient/{login}', 'MkBlockController@unlockClient')->name('unlockClient');
        Route::get('/blockClient/{login}', 'MkBlockController@blockClient')->name('blockClient');
        Route::get('/rebootClient/{login}', 'MkBlockController@rebootClient')->name('rebootClient');
    });
});

//https://painel.gbittelecom.com.br/api/v1/zlr5y213/mkblock/unlockClient/{login}
//https://painel.gbittelecom.com.br/api/v1/zlr5y213/mkblock/blockClient/{login}
//https://painel.gbittelecom.com.br/api/v1/zlr5y213/mkblock/rebootClient/{login}
