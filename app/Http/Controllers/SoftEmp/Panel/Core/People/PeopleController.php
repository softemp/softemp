<?php
/**
 * Created by PhpStorm.
 * User: paulo
 * Date: 06/03/18
 * Time: 16:55
 */

namespace App\Http\Controllers\SoftEmp\Panel\Core\People;

use App\Http\Controllers\SoftEmp\Panel\CrudController;
use App\Models\Core\AccessControl\Occupation;
use App\Models\Core\AccessControl\Role;
use App\Models\Core\Company\Company;
use App\Models\Core\People\People;
use App\Models\Core\People\Physical;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;

class PeopleController extends CrudController
{
    protected $pathView = 'softemp.panel.core.people';
    protected $groupRoute = 'panel.people';

    public function __construct(People $model, Request $request)
    {
        parent::__construct($model, $request, $this->groupRoute, $this->pathView);
    }

    public function index()
    {
        $physicals = $this->model->where('people_type_id','1')->count();
        $companies = $this->model->where('people_type_id','2')->count();
       // dd($employee);
        $data = $this->model->all();

        return view("{$this->pathView}.index", compact('data','physicals','companies'));
    }
}
