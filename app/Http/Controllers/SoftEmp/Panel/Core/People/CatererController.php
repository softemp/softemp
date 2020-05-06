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
use App\Models\Core\Contact\ContType;
use App\Models\Core\People\People;
use App\Models\Core\People\Physical;
use Illuminate\Http\Request;

class CatererController extends CrudController
{
    protected $pathView = 'softemp.panel.core.people.caterer';
    protected $groupRoute = 'panel.people.caterer';

    private $roleCaterer;

    public function __construct(Company $model, Request $request)
    {
        //definindo o objeto fornecedor
        $this->roleCaterer = Role::find(env('ROLE_CATERER_ID'));

        parent::__construct($model, $request, $this->groupRoute, $this->pathView);
    }

    public function index()
    {
        //pegando as pessoas com o papél de fornecedor
//        $data = $this->roleCaterer->people;
        $this->model = $this->roleCaterer->people;

        //return view("{$this->pathView}.index", compact('data'));
        return parent::index();
    }

    public function edit($id)
    {
        $data = People::find($id);

        if (is_object($data->company)){
            $id = $data->company->id;
        }
        if (is_object($data->physical)){
            $id = $data->physical->id;
            $this->model = $data->physical;
        }

        $this->arrayData['contTypes'] = ContType::all();

        return parent::edit($id);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function defineRole($id)
    {
        $people = $this->model->find($id)->people;
        $isCaterer = $people->roles->find(env('ROLE_CATERER_ID'));
        if (!$isCaterer) {
            $people->roles()->attach(env('ROLE_CATERER_ID'));
            return $id;
        }
        return $id;
    }
}
