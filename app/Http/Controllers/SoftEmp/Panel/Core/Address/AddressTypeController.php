<?php

namespace App\Http\Controllers\SoftEmp\Panel\Core\Address;

use App\Http\Controllers\SoftEmp\Panel\CrudController;
use App\Http\Validators\Address\AddressTypeValidator;
use App\Models\Core\Address\AddressType;
use Illuminate\Http\Request;

class AddressTypeController extends CrudController
{
    /**
     * caminho das views
     *
     * @var type
     */
    protected $pathView= 'softemp.panel.address.type';

    protected $groupRoute = 'panel.address.type';

    /**
     * RolesController constructor.
     */
    public function __construct(AddressType $model, Request $request)
    {
//        $this->validator = $validator;

    parent::__construct($model, $request, $this->groupRoute, $this->pathView);
}
}
