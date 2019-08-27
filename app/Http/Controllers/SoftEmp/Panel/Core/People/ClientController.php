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
use App\Models\Core\People\People;
use App\Models\Core\People\Physical;
use Illuminate\Http\Request;

class ClientController extends CrudController
{
    protected $pathView = 'softemp.panel.core.people.client';
    protected $groupRoute = 'panel.people.client';

    private $roleClient;

    public function __construct(People $model)
    {
        //definindo o objeto clientes
        $this->roleClient = Role::find(env('ROLE_CLIENT_ID'));

        parent::__construct($model, $this->groupRoute, $this->pathView);
    }

    public function index()
    {
        //pegando as pessoas com o papél de clientes
        $data = $this->roleClient->people;

        return view("{$this->pathView}.index", compact('data'));
    }
}