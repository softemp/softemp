<?php

//Route::get('/', function () {
//    return view('welcome');
//});

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/admin', 'HomeController@admin')->name('admin');
//Route::get('/panel', 'HomeController@admin')->name('panel.index');
Route::get('/panel/v2', 'HomeController@admin')->name('panel.index2');
//
Route::get('/panel/pages/blank', 'SoftEmp\Panel\PageController@blank')->name('panel.pages.blank');
//Route::get('/panel/pages/tabela', 'SoftEmp\Panel\PageController@tabela')->name('panel.pages.tabela');
//Route::get('/panel/pages/select2', 'SoftEmp\Panel\PageController@select2')->name('panel.pages.select2');
//Route::get('/panel/pages/icheck', 'SoftEmp\Panel\PageController@icheck')->name('panel.pages.icheck');

// Directory SoftEmp
Route::group(['namespace' => 'SoftEmp'], function () {

    //Web site
    Route::group(['namespace' => 'WebSite'], function () {
        Route::group(['as' => 'website.'], function () {
            Route::group(['as' => 'home.'], function () {
                Route::get('/', 'HomeController@index')->name('index');
                Route::get('/home', 'HomeController@index')->name('index');
            });
            Route::get('/contato', 'ContactController@index')->name('contact.index');
            Route::get('/sobre', 'AboutController@index')->name('about.index');
            Route::get('/planos', 'PlansController@index')->name('plans.index');
            Route::get('/ajuda', 'HelpController@index')->name('help.index');
        });
    });

    //Tecnicos
    Route::group(['namespace' => 'WebSite'], function () {
        Route::group(['as' => 'website.'], function () {
            Route::group(['as' => 'home.'], function () {
                Route::get('/', 'HomeController@index')->name('index');
                Route::get('/home', 'HomeController@index')->name('index');
            });
            Route::get('/contato', 'ContactController@index')->name('contact.index');
            Route::get('/sobre', 'AboutController@index')->name('about.index');
            Route::get('/planos', 'PlansController@index')->name('plans.index');
            Route::get('/ajuda', 'HelpController@index')->name('help.index');
        });
    });

    // Directory Painel de controle
    Route::group(['namespace' => 'Panel'], function () {

        // Painel de administração
        Route::group(['prefix' => '/painel', 'as' => 'panel.'], function () {

            // Bloqueio de clientes do MkAuth
//            Route::group(['namespace' => 'Provedor','prefix' => '/provedor/mkblock/telegram', 'as' => 'provedor.mkblock.telegram.'], function () {
////                Route::get('/', 'MkBlockController@sincLoginBlock')->name('sincLoginBlock');
//                Route::get('/unlockClient/{login}', 'MkBlockController@unlockClient')->name('unlockClient');
//                Route::get('/blockClient/{login}', 'MkBlockController@blockClient')->name('blockClient');
//                Route::get('/rebootClient/{login}', 'MkBlockController@rebootClient')->name('rebootClient');
//            });
            // end Bloqueio de clientes do MkAuth

            // Directory Core
            Route::group(['namespace' => 'Core'], function () {

                // Autenticate
                Route::group(['namespace' => 'Auth', 'prefix' => '/auth', 'as' => 'auth.'], function () {
//                Route::group(['namespace' => 'Auth'], function () {

                    // login
                    Route::get('login', 'LoginController@showLoginForm')->name('login.form');
                    Route::post('login', 'LoginController@login')->name('login');
                    // end login

                    Route::post('logout', 'LoginController@logout')->name('logout')->middleware('softemp.auth');

                    // redefinir senha
                        Route::get('password/forgot',
                            'ForgotPasswordController@showLinkRequestForm')->name('password.forgot.form');
                        Route::post('password/forgot',
                            'ForgotPasswordController@sendResetLinkEmail')->name('password.forgot');
                    // end redefinir senha

                });// end Autenticate

            });// end Directory Core

            // Routes Autenticated
            //Route::group(['middleware' => ['auth']], function () {
            Route::group(['middleware' => ['softemp.auth']], function () {

               Route::get('/', 'DashBoardController@index')->name('index');

                // Directory Core
                Route::group(['namespace' => 'Core'], function () {

                    // Directory pessoas
                    Route::group(['namespace' => 'People'], function () {
                        Route::group(['prefix' => '/pessoa', 'as' => 'people.'], function () {

                            // Directory pessoa física
                            Route::group(['namespace' => 'Physical'], function () {
                                //Route::resource('person', 'PersonController');

                                // Colaborador
                                Route::group(['prefix' => '/colaborador', 'as' => 'employee.'], function () {

                                    Route::get('/', 'EmployeeController@index')->name('index');
                                    Route::get('/cadastrar', 'EmployeeController@create')->name('create');
                                    Route::post('/salvar', 'EmployeeController@store')->name('store');
                                    Route::get('/show/{role}', 'EmployeeController@show')->name('show');
                                    Route::get('/{role}/editar', 'EmployeeController@edit')->name('edit');
                                    Route::put('/{role}/alterar', 'EmployeeController@update')->name('update');
                                    Route::delete('/{role}', 'EmployeeController@destroy')->name('destroy');

                                    Route::put('{id}/define/employee',
                                        'EmployeeController@defineEmployee')->name('define.employee');
                                    Route::get('{person_id}/restore', 'EmployeeController@restore')->name('restore');

                                    Route::delete('{email_id}/delete/email',
                                        'EmployeeController@detroyEmail')->name('destroy.email');
                                    Route::delete('{phone_id}/delete/phone',
                                        'EmployeeController@detroyPhone')->name('destroy.phone');
                                });
                                //Route::resource('employee', 'EmployeeController');
                                // end Colaborador

                                //profile
                                Route::get('fisica/preferencias',
                                    'PhysicalController@profile')->name('physical.profile');

                                Route::get('physical/autocomplete/name',
                                    'PhysicalController@autocompleteName')->name('physical.autocomplete.name');
                                Route::get('physical/autocomplete/document',
                                    'PhysicalController@autocompleteDocument')->name('physical.autocomplete.document');

                                Route::resource('physical', 'PhysicalController');

                            });
                            // end Directory pessoa física

                            // Directory pessoa jurídica
                            Route::namespace('Legal')->group(function () {
                                Route::resource('legal', 'PhysicalController');
                                Route::prefix('empresas')->name('company.')->group(function () {
                                    // Autocompletar
                                    Route::get('/auto-completar', 'CompanyController@autocomplete')->name('autocomplete');
                                    // end Autocompletar
                                });
                                Route::resource('company', 'CompanyController');
                            });
                            // end Directory pessoa jurídica

                            // Fornecedores
                            Route::group(['prefix' => '/fornecedor', 'as' => 'caterer.'], function () {
                                Route::get('/', 'CatererController@index')->name('index');
                                Route::get('/cadastrar', 'CatererController@create')->name('create');
                                Route::post('/salvar', 'CatererController@store')->name('store');
                                Route::get('/show/{id}', 'CatererController@show')->name('show');
                                Route::get('/{id}/editar', 'CatererController@edit')->name('edit');
                                Route::put('/{id}/alterar', 'CatererController@update')->name('update');
                                Route::delete('/{id}', 'EmployeeController@destroy')->name('destroy');
                                //Route::resource('caterer', 'CatererController');

                                Route::put('{id}/role/define', 'CatererController@defineRole')->name('role.define');

                            });
                            // end Fornecedores

                            // Clientes
                            Route::resource('client', 'ClientController');
                            // end Clientes
                        });
                        Route::resource('people', 'PeopleController');

                    });
                    // end Directory pessoas

                    //Configuração
                    Route::group(['namespace' => 'Configuration', 'prefix' => 'configuracao', 'as' => 'configuration.'], function () {
                        // Directory Companies
                        Route::group(['namespace' => 'Company'], function () {
                            // Company
                            Route::group(['prefix' => 'empresa', 'as' => 'company.'], function () {
                                    Route::get('/', 'CompanyController@index')->name('index');
                                    Route::put('/update/data/{id}', 'CompanyController@updateData')->name('updateData');
                                    Route::put('/update/address/{id}', 'CompanyController@updateAddress')->name('updateAddress');
                            });
                            // end Company
                        });
                        // end Directory Companies
                    });

                    // Directory Contact
                    Route::group(['namespace' => 'Contact'], function () {
                        // Contato
                        Route::group(['prefix' => 'contato', 'as' => 'contact.'], function () {
                            // Tipo de Contato
                            Route::group(['prefix' => 'tipo', 'as' => 'type.'], function () {
                                Route::get('/', 'ContactTypeController@index')->name('index');
                                Route::get('/cadastrar', 'ContactTypeController@create')->name('create');
                                Route::post('/salvar', 'ContactTypeController@store')->name('store');
                                Route::get('/show/{role}', 'ContactTypeController@show')->name('show');
                                Route::get('/{type}/editar', 'ContactTypeController@edit')->name('edit');
                                Route::put('/{type}/alterar', 'ContactTypeController@update')->name('update');
                                Route::delete('/{type}', 'ContactTypeController@destroy')->name('destroy');
                            });
                            // end Tipo de Contato

                            // Contato por email
                            Route::group(['prefix' => 'email', 'as' => 'email.'], function () {
                                Route::get('/', 'EmailController@index')->name('index');
                            });
                            // end Contato por email
                        });
                        // end Contato
                    });
                    // end Directory Contact

                    // Directory Access Control
                    Route::group(['namespace' => 'AccessControl'], function () {
                        // Module Accesss Control
                        Route::group(['prefix' => '/controle/acesso', 'as' => 'access.control.'], function () {

                            // module
                            Route::group([
                                'prefix' => trans('panel/accesscontrol/module.url_prefix'),
                                'as' => 'module.'
                            ], function () {
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

                    #Address
                    Route::group(['prefix' => 'endereco', 'as' => 'address.', 'namespace' => 'Address'], function () {
                        #Continentes
                        Route::resource('continent', 'ContinentController');
                        #Paises
                        Route::group(['prefix' => 'pais', 'as' => 'country.'], function () {
                            Route::get('/getCountry', 'CountryController@getCountry')->name('getCountry');
                        });
                        Route::resource('country', 'CountryController');
                        #Estados
                        Route::group(['prefix' => 'estado', 'as' => 'state.'], function () {
                            Route::get('/getState', 'StateController@getState')->name('getState');
                        });
                        Route::resource('state', 'StateController');
                        #Cidades
                        Route::group(['prefix' => 'cidade', 'as' => 'city.'], function () {
                            Route::get('getCity', 'CityController@getCity')->name('getCity');
                        });
                        Route::resource('city', 'CityController');
                        #Bairros
                        Route::group(['prefix' => 'bairro', 'as' => 'neighborhood.'], function () {
                            Route::get('getNeighboarhood', 'NeighboarhoodController@getNeighboarhood')->name('getNeighboarhood');
                        });
                        Route::resource('neighboarhood', 'NeighboarhoodController');
                        #Logradouros
                        Route::group(['prefix' => 'logradouro', 'as' => 'street.'], function () {
                            Route::get('getStreet', 'StreetController@getStreet')->name('getStreet');
                        });
                        Route::resource('street', 'StreetController');
                        #Endereço
                        Route::group(['prefix' => 'endereco', 'as' => 'address.'], function () {
                            Route::put('/{id}/status/disable', 'AddressController@statusDisable')->name('status.disable');
                            Route::put('/{id}/status/activate', 'AddressController@statusActivate')->name('status.activate');
                            Route::put('/{id}/main/define', 'AddressController@mainDefine')->name('main.define');
                            //Route::get('/{id}/get/edit', 'AddressController@getEdit')->name('get.edit');
                        });
                        //Route::resource('address', 'AddressController')->only(['create','edit','update','destroy']);
                        Route::resource('address', 'AddressController');
                        #Tipo de Endereço
                        Route::resource('type', 'AddressTypeController');
                    });
                    #end Address

                });
                // end Directory Core

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

                // Directory stock control
                Route::group(['namespace' => 'StockControl'], function () {

                    Route::group(['prefix' => 'estoque'], function () {

                        //Equipamentos
                        Route::group(['prefix' => '/equipamentos', 'as' => 'stockcontrol.'], function () {
                            Route::get('/', 'EquipmentController@index')->name('equipment.index');
                            Route::get('/editar/{id}', 'EquipmentController@edit')->name('equipment.edit');
                            Route::put('/update/{id}', 'EquipmentController@update')->name('equipment.update');
                            Route::get('/cadastrar', 'EquipmentController@create')->name('equipment.create');
                            Route::post('/cadastrar/novo', 'EquipmentController@store')->name('equipment.store');
                            Route::post('/lixeira', 'EquipmentController@putTrash')->name('equipment.putTrash');
                            Route::post('/devolver', 'EquipmentController@putStock')->name('equipment.putStock');
                            Route::post('/devolverOrdem', 'EquipmentController@putStockFromOrder')->name('equipment.putStockFromOrder');
                            Route::post('/buscar',
                                'EquipmentController@barCodeSearch')->name('equipment.barCodeSearch');
                            Route::get('/show/{id}', 'EquipmentController@show')->name('equipment.show');
                            Route::delete('/remover/{id}', 'EquipmentController@destroy')->name('equipment.destroy');
                        });
                        //end equipamentos

                        //Modelo de equipamento
                        Route::group(['prefix' => '/modelos', 'as' => 'stockcontrol.'], function () {
                            Route::get('/', 'EquipmentModelController@index')->name('model.index');
                            Route::get('/editar/{id}', 'EquipmentModelController@edit')->name('model.edit');
                            Route::put('/update/{id}', 'EquipmentModelController@update')->name('model.update');
                            Route::get('/cadastrar', 'EquipmentModelController@create')->name('model.create');
                            Route::post('/cadastrar/novo', 'EquipmentModelController@store')->name('model.store');
                            Route::get('/show/{id}', 'EquipmentModelController@show')->name('model.show');
                            Route::delete('/remover/{id}', 'EquipmentModelController@destroy')->name('model.destroy');
                        });
                        //end modelo de equipamento

                        // Técnicos
                        Route::group(['prefix' => '/tecnicos', 'as' => 'stockcontrol.'], function () {
                            Route::get('/', 'TechnicalController@index')->name('technical.index');
                            Route::get('/editar/{id}', 'TechnicalController@edit')->name('technical.edit');
                            Route::put('/update/{id}', 'TechnicalController@update')->name('technical.update');
                            Route::get('/cadastrar', 'TechnicalController@create')->name('technical.create');
                            Route::post('/cadastrar/novo', 'TechnicalController@store')->name('technical.store');
                            Route::get('/show/{id}', 'TechnicalController@show')->name('technical.show');
                            Route::delete('/remover/{id}', 'TechnicalController@destroy')->name('technical.destroy');
                        });
                        // end tecnicos

                        // Ordens de saída de equipamentos
                        Route::group(['prefix' => '/ordens', 'as' => 'stockcontrol.'], function () {
                            Route::get('/', 'OrderOutController@index')->name('order.index');
                            Route::get('/fechadas', 'OrderOutController@closedorders')->name('order.closed');
                            Route::get('/editar/{id}', 'OrderOutController@edit')->name('order.edit');
                            Route::get('/imprimir/{id}', 'OrderOutController@print')->name('order.print');
                            Route::put('/update/{id}', 'OrderOutController@update')->name('order.update');
                            Route::get('/cadastrar', 'OrderOutController@create')->name('order.create');
                            Route::post('/cadastrar/novo', 'OrderOutController@store')->name('order.store');
                            Route::post('/oestatus', 'OrderOutController@oestatusUpdate')->name('order.oestatusupdate');
                            Route::get('/ver/{id}', 'OrderOutController@show')->name('order.show');
                            Route::delete('/remover/{id}', 'OrderOutController@destroy')->name('order.destroy');
                            Route::get('/fechar/{id}', 'OrderOutController@closeOrder')->name('order.close');
                            Route::post('/destinar',
                                'OrderOutController@assignEquipment')->name('order.assignEquipment');
                        });

                    });

                });
                //end directory stock control

            });// end Routes Autenticated

        });// end Painel de administração

    });// end Directory Painel de controle

});// end Directory SoftEmp

