<?php

namespace App\Http\Controllers\SoftEmp\Panel\Core\AccessControl;

use App\Http\Controllers\SoftEmp\Panel\CrudController;
use App\Models\Base\AccessControl\Module;
use App\Models\Base\AccessControl\Permission;
use Illuminate\Http\Request;

/**
 * Class PermissionController
 * @package App\Http\Controllers\SoftEmp\Panel\Base\AccessControl
 */
class PermissionController extends CrudController
{
    private $module;

    public function __construct(Permission $permission, Request $request, Module $module)
    {
        $pathView = 'softemp.panel.base.access_control.permission';
        $groupRoute = 'panel.access.control.permission';

        $this->module = $module;

        parent::__construct($permission, $request, $groupRoute, $pathView);
    }

    public function create()
    {
        $this->arrayData['modules'] = $this->module->all(['id','name']);

        return parent::create(); // TODO: Change the autogenerated stub
    }

    public function store()
    {
        $this->request['slug'] = $this->request->name;
        return parent::store(); // TODO: Change the autogenerated stub
    }
}
