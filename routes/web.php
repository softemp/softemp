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


// Provisional routes of the stock control system;
Route::get('/equipamentos', 'Softemp\Panel\StockControl\EquipmentController@index')->name('equipment.index');
Route::get('/equipamentos/editar/{id}', 'Softemp\Panel\StockControl\EquipmentController@edit')->name('equipment.edit');
Route::put('/equipamentos/{id}', 'Softemp\Panel\StockControl\EquipmentController@update')->name('equipment.update');
Route::get('/equipamentos/novo', 'Softemp\Panel\StockControl\EquipmentController@create')->name('equipment.create');
Route::post('/equipamentos', 'Softemp\Panel\StockControl\EquipmentController@store')->name('equipment.store');


Route::get('/equipamentos/modelos', 'EquipmentModelController@index')->name('equipment.models.index');
Route::get('/equipamentos/modelos/editar/{id}', 'EquipmentModelController@edit')->name('equipment.models.edit');
Route::put('/equipamentos/modelos/{id}', 'EquipmentModelController@update')->name('equipment.models.update');
Route::get('/equipamentos/modelos/novo', 'EquipmentModelController@create')->name('equipment.models.create');
Route::post('/equipamentos/modelos', 'EquipmentModelController@store')->name('equipment.models.store');

// end of provisional routes



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'HomeController@admin')->name('admin');
Route::get('/painel', 'HomeController@admin')->name('panel.index');
Route::get('/painel/v2', 'HomeController@admin')->name('panel.index2');

Route::get('/panel/pages/blank', 'SoftEmp\Panel\PageController@blank')->name('panel.pages.blank');
Route::get('/panel/pages/tabela', 'SoftEmp\Panel\PageController@tabela')->name('panel.pages.tabela');
Route::get('/panel/pages/select2', 'SoftEmp\Panel\PageController@select2')->name('panel.pages.select2');
Route::get('/panel/pages/icheck', 'SoftEmp\Panel\PageController@icheck')->name('panel.pages.icheck');

// Directory SoftEmp
Route::group(['namespace' => 'SoftEmp'], function () {

    // Directory Painel de controle
    Route::group(['namespace' => 'Panel'], function () {

        // Directory Base
        Route::group(['namespace' => 'Base'], function () {

            // Autenticate
            Route::group(['namespace' => 'Auth', 'prefix' => '/auth', 'as' => 'auth.'], function () {

                // login
                Route::get('login','LoginController@showLoginForm')->name('login.form');
                Route::post('login','LoginController@login')->name('login');
                // end login

                Route::post('logout','LoginController@logout')->name('logout')->middleware('auth');

                // redefinir senha
                Route::get('password/forgot','ForgotPasswordController@showLinkRequestForm')->name('password.forgot.form');
                Route::post('password/forgot','ForgotPasswordController@sendResetLinkEmail')->name('password.forgot');
                // end redefinir senha

            });
            // end Autenticate

        });
        // endDirectory Base

        // Routes Autenticated
        Route::group(['middleware' => ['auth']], function () {

            // Painel de administração
            Route::group(['prefix' => '/painel', 'as' => 'panel.'], function () {

                // Directory Base
                Route::group(['namespace' => 'Base'], function () {

                    Route::get('/', 'DashBoardController@index')->name('index');

                    // Directory users
                    Route::group(['namespace' => 'User'], function () {
                        Route::group(['prefix' => '/usuario', 'as' => 'user.'], function () {

                            //Colaborador
                            Route::group(['prefix' => '/colaborador', 'as' => 'employee.'], function () {
                                Route::get('/', 'EmployeeController@index')->name('index');
                            });
                           // Route::resource('employees', 'EmployeeController');
                            //end colaborador
                        });
                    });
                    // end Directory users

                    // Directory Access Control
                    Route::group(['namespace' => 'AccessControl'], function () {
                        // Module Accesss Control
                        Route::group(['prefix' => '/controle/acesso', 'as' => 'access.control.'], function () {

                            // module
                            Route::group(['prefix' => trans('panel/accesscontrol/module.url_prefix'), 'as' => 'module.'], function () {
                                Route::get('/', 'ModuleController@index')->name('index');
                                Route::get('/cadastrar', 'ModuleController@create')->name('create');
                                Route::post('/salvar', 'ModuleController@store')->name('store');
                                Route::get('/show/{role}', 'ModuleController@show')->name('show');
                                Route::get('/editar/{role}', 'ModuleController@edit')->name('edit');
                                Route::put('/alterar/{role}', 'ModuleController@update')->name('update');
                                Route::delete('/remover/{role}', 'ModuleController@destroy')->name('destroy');
                            });
                            //end module

                            // permission
                            Route::group(['prefix' => 'permissao', 'as' => 'permission.'], function () {
                                Route::get('/', 'PermissionController@index')->name('index');
                                Route::get('/cadastrar', 'PermissionController@create')->name('create');
                                Route::post('/salvar', 'PermissionController@store')->name('store');
                                Route::get('/show/{role}', 'PermissionController@show')->name('show');
                                Route::get('/editar/{role}', 'PermissionController@edit')->name('edit');
                                Route::put('/alterar/{role}', 'PermissionController@update')->name('update');
                                Route::delete('/remover/{role}', 'PermissionController@destroy')->name('destroy');
                            });
                            //end permission

                            // roles
                            Route::group(['prefix' => '/papeis', 'as' => 'role.'], function () {
                                Route::get('/', 'RoleController@index')->name('index');
                                Route::get('/cadastrar', 'RoleController@create')->name('create');
                                Route::post('/salvar', 'RoleController@store')->name('store');
                                Route::get('/show/{role}', 'RoleController@show')->name('show');
                                Route::get('/editar/{role}', 'RoleController@edit')->name('edit');
                                Route::put('/alterar/{role}', 'RoleController@update')->name('update');
                                Route::delete('/remover/{role}', 'RoleController@destroy')->name('destroy');
                            });
                            //end roles

                            // occupation
                            Route::group(['prefix' => '/ocupacao', 'as' => 'occupation.'], function () {
                                Route::get('/', 'OccupationController@index')->name('index');
                                Route::get('/cadastrar', 'OccupationController@create')->name('create');
                                Route::post('/salvar', 'OccupationController@store')->name('store');
                                Route::get('/show/{occupation}', 'OccupationController@show')->name('show');
                                Route::get('/editar/{occupation}', 'OccupationController@edit')->name('edit');
                                Route::put('/alterar/{occupation}', 'OccupationController@update')->name('update');
                                Route::delete('/remover/{occupation}', 'OccupationController@destroy')->name('destroy');
                            });
                            //end occupation
                        });
                        // end Module Accesss Control
                    });
                    // end Directory Access Control

                });
                // end Directory Base

                // Directoy MkAuth
                Route::group(['namespace' => 'MkAuth','prefix' => '/mkauth', 'as' => 'mkauth.'], function () {
                    // Tables
                    Route::group(['namespace' => 'Table','prefix' => '/tabelas', 'as' => 'table.'], function () {
                        Route::get('/', 'TableController@index')->name('index');
                        Route::get('/{table}', 'TableController@show')->name('show');
                    });
                    // end Tables

                    // CTOs
                    Route::group(['namespace' => 'Cto','prefix' => '/cto', 'as' => 'cto.'], function () {
                        Route::get('/', 'CtoController@index')->name('index');
                        Route::get('/{cto}', 'CtoController@show')->name('show');
                    });
                    // end CTOs

                    // CTOs
                    Route::group(['namespace' => 'Client','prefix' => '/cliente', 'as' => 'client.'], function () {
                        Route::get('/', 'ClientController@index')->name('index');
                        Route::get('/ativo', 'ClientController@active')->name('active');
                        Route::get('/bloqueado', 'ClientController@blocked')->name('blocked');
                        Route::get('/desativado', 'ClientController@disabled')->name('disabled');
                        Route::get('/{client}', 'ClientController@show')->name('show');
                    });
                    // end CTOs

                    // Support
//                    Route::group(['prefix' => '/suporte', 'as' => 'supports.', 'namespace' => 'Supports'], function () {
//                        Route::get('/', 'SupportsController@index')->name('index');
//
//                    });
                    // end Support
                });
                //end Directoy MkAuth

                // Directory stock control
                Route::group(['namespace' => 'StockControl'], function () {
                    //Equipamentos
                Route::group(['prefix' => '/estoque', 'as' => 'stockcontrol.'], function (){
                    Route::get('/equipamentos', 'EquipmentController@index')->name('equipment.index');
                    Route::get('/equipamentos/editar/{id}', 'EquipmentController@edit')->name('equipment.edit');
                    Route::put('/equipamentos/update/{id}', 'EquipmentController@update')->name('equipment.update');

                });
                });
                //end directory stock control

            });
            // end Painel de administração

        });
        // end Routes Autenticated

    });
    // end Directory Painel de controle

});
// end Directory SoftEmp
