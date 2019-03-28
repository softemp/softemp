<?php

namespace App\Http\Controllers\SoftEmp\Panel\Base\AccessControl;

use App\Http\Controllers\SoftEmp\Panel\CrudController;
use App\Models\Base\AccessControl\Permission;
use Illuminate\Http\Request;

class PermissionController extends CrudController
{
    public function __construct(Permission $permission)
    {
        $pathView = 'softemp.panel.base.access_control.permission';
        $groupRoute = 'panel.access.control.permission';

        parent::__construct($permission, $groupRoute, $pathView);
    }
}
