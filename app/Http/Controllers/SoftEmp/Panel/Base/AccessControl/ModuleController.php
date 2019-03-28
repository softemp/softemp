<?php

namespace App\Http\Controllers\SoftEmp\Panel\Base\AccessControl;

use App\Http\Controllers\SoftEmp\Panel\CrudController;
use App\Models\Base\AccessControl\Module;
use App\Models\Base\AccessControl\Role;
use Illuminate\Http\Request;

/**
 * Class ModuleController
 * @package App\Http\Controllers\SoftEmp\Panel\Base\AccessControl
 */
class ModuleController extends CrudController
{
    public function __construct()
    {
        $this->model = new Module;
        //$this->request = $request;
        $this->pathView = 'softemp.panel.base.access_control.module';
        $this->groupRoute = 'panel.access.control.module';
    }
}
