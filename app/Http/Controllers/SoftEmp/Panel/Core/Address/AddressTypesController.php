<?php

namespace App\Http\Controllers\SoftEmp\Panel\Core\Address;

use App\Http\Validators\Address\AddressTypeValidator;
use App\Models\Core\Address\AddressType;
use Illuminate\Http\Request;
use App\Http\Controllers\SoftEmp\CrudController;

class AddressTypesController extends CrudController
{
    /**
     * caminho das views
     *
     * @var type
     */
    protected $nameView = 'softemp.panel.address.types';

    /**
     * route basic
     *
     * @var type
     */
    protected $route = 'panel.address.types';

    /**
     * RolesController constructor.
     */
    public function __construct(AddressType $model, Request $request, AddressTypeValidator $validator)
    {
        $this->model = $model;
        $this->request = $request;
        $this->validator = $validator;
    }
}
