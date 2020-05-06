<?php

// Directory SoftEmp
Route::group(['namespace' => 'SoftEmp'], function () {

    // Directory Painel de controle
    Route::group(['namespace' => 'Panel'], function () {

        // Painel de administração
        Route::group(['prefix' => '/painel', 'as' => 'panel.'], function () {

            // Bloqueio de clientes do MkAuth
            Route::group(['namespace' => 'Provedor','prefix' => '/provedor/mkblock/telegram', 'as' => 'provedor.mkblock.telegram.'], function () {
//                Route::get('/', 'MkBlockController@sincLoginBlock')->name('sincLoginBlock');
                Route::get('/unlockClient/{login}', 'MkBlockController@unlockClient')->name('unlockClient');
                Route::get('/blockClient/{login}', 'MkBlockController@blockClient')->name('blockClient');
                Route::get('/rebootClient/{login}', 'MkBlockController@rebootClient')->name('rebootClient');
            });
            // end Bloqueio de clientes do MkAuth


            // Routes Autenticated
            //Route::group(['middleware' => ['auth']], function () {
            Route::group(['middleware' => ['softemp.auth']], function () {

                // Directoy Provedor
                Route::group(['namespace' => 'Provedor', 'prefix' => '/provedor', 'as' => 'provedor.'], function () {
                    Route::get('/', 'ProvedorController@index')->name('index');
                    // Directoy MkAuth
                    Route::group(['namespace' => 'MkAuth', 'prefix' => '/mkauth', 'as' => 'mkauth.'], function () {
                        // Tables
                        Route::group(['namespace' => 'Table', 'prefix' => '/tabelas', 'as' => 'table.'], function () {
                            Route::get('/', 'TableController@index')->name('index');
                            Route::get('/{table}', 'TableController@show')->name('show');
                        });
                        // end Tables

                        // CTOs
                        Route::group(['namespace' => 'Cto', 'prefix' => '/cto', 'as' => 'cto.'], function () {
                            Route::get('/', 'CtoController@index')->name('index');
                            Route::get('/{cto}', 'CtoController@show')->name('show');
                        });
                        // end CTOs

                        // CTOs
                        Route::group(['namespace' => 'Client', 'prefix' => '/cliente', 'as' => 'client.'], function () {
                            Route::get('/', 'ClientController@index')->name('index');
                            Route::get('/ativo', 'ClientController@active')->name('active');
                            Route::get('/liberado', 'ClientController@free')->name('free');
                            Route::get('/bloqueado', 'ClientController@blocked')->name('blocked');
                            Route::get('/desativado', 'ClientController@disabled')->name('disabled');
                            Route::get('/{client}', 'ClientController@show')->name('show');
                        });
                        // end CTOs
                    });
                    //end Directoy MkAuth

                    // Bloqueio de clientes do MkAuth
                    Route::group(['prefix' => '/mkblock', 'as' => 'mkblock.'], function () {
                        Route::get('/', 'MkBlockController@sincLoginBlock')->name('sincLoginBlock');
                        Route::get('/unlockClient/{login}', 'MkBlockController@unlockClient')->name('unlockClient');
                        Route::get('/blockClient/{login}', 'MkBlockController@blockClient')->name('blockClient');
                        Route::get('/rebootClient/{login}', 'MkBlockController@rebootClient')->name('rebootClient');
                    });
                    // end Bloqueio de clientes do MkAuth

                    // Directory Network
                    Route::group(['namespace' => 'Network', 'prefix' => '/rede', 'as' => 'network.'], function () {
                        // Rota para manutenção
                        Route::group(['prefix' => '/rota', 'as' => 'route.'], function () {
                            Route::get('/', 'RouteController@index')->name('index');
                        });
                        // end Rota para manutenção
                    });
                    //end directory Network

                });
                //end Directoy Provedor

            });// end Routes Autenticated

        });// end Painel de administração

    });// end Directory Painel de controle

});// end Directory SoftEmp

