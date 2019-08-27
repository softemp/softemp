<?php
/**
 * Created by PhpStorm.
 * User: paulo
 * Date: 06/03/18
 * Time: 16:55
 */

namespace App\Http\Controllers\SoftEmp\Panel\Core\People\Legal;

use App\Http\Controllers\SoftEmp\Panel\CrudController;
use App\Models\Core\Company\Company;
use Illuminate\Http\Request;

class CompanyController extends CrudController
{
    protected $pathView = 'softemp.panel.core.people.legal.company';
    protected $groupRoute = 'panel.people.company';

    public function __construct(Company $model)
    {
        parent::__construct($model, $this->groupRoute, $this->pathView);
    }

    public function index()
    {
        $data = $this->model->all();

        return view("{$this->pathView}.index", compact('data'));
    }


}