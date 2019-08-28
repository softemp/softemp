<?php

namespace App\Http\Controllers\SoftEmp\Panel\Core\AccessControl;

use App\Http\Controllers\SoftEmp\Panel\CrudController;
use App\Models\Core\AccessControl\Role;
use Illuminate\Http\Request;

/**
 * Class RoleController
 * @package App\Http\Controllers\SoftEmp\Panel\Base\AccessControl
 */
class RoleController extends CrudController
{
    /**
     * RoleController constructor.
     * @param Role $role
     */
    public function __construct(Role $role, Request $request)
    {
        $pathView = 'softemp.panel.core.access_control.role';
        $groupRoute = 'panel.access.control.role';

        parent::__construct($role, $request, $groupRoute, $pathView);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->request['slug'] = $this->request->name;

        return parent::store(); // TODO: Change the autogenerated stub
    }
}
