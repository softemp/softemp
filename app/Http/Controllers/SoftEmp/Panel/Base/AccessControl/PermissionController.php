<?php

namespace App\Http\Controllers\SoftEmp\Panel\Base\AccessControl;

use App\Http\Controllers\SoftEmp\Panel\CrudController;
use App\Models\Base\AccessControl\Permission;
use Illuminate\Http\Request;

class PermissionController extends CrudController
{
    public function __construct()
    {
        $this->model = new Permission;
        //$this->request = $request;
        $this->pathView = 'softemp.panel.base.access_control.permission';
        $this->groupRoute = 'panel.access.control.permission';
    }
}
