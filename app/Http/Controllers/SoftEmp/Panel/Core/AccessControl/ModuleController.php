<?php

namespace App\Http\Controllers\SoftEmp\Panel\Core\AccessControl;

use App\Http\Controllers\SoftEmp\Panel\CrudController;
use App\Models\Core\Module\Module;
use App\Models\Base\AccessControl\Role;
use Illuminate\Http\Request;

/**
 * Class ModuleController
 * @package App\Http\Controllers\SoftEmp\Panel\Base\AccessControl
 */
class ModuleController extends CrudController
{
    public function __construct(Module $module, Request $request)
    {
        $pathView = 'softemp.panel.base.access_control.module';
        $groupRoute = 'panel.access.control.module';

        parent::__construct($module, $request, $groupRoute, $pathView);
    }
}
