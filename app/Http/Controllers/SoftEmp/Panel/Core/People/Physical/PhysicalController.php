<?php
/**
 * Created by PhpStorm.
 * User: paulo
 * Date: 06/03/18
 * Time: 16:55
 */

namespace App\Http\Controllers\SoftEmp\Panel\Core\People\Physical;

use App\Http\Controllers\SoftEmp\Panel\CrudController;
use App\Models\Core\People\Physical;
use Illuminate\Http\Request;

class PhysicalController extends CrudController
{
    protected $pathView = 'softemp.panel.core.people.physical';
    protected $groupRoute = 'panel.people.physical';

    public function __construct(Physical $model, Request $request)
    {
        $this->request = $request;
        parent::__construct($model, $this->groupRoute, $this->pathView);
    }

    public function autocompleteName()
    {
        $query = $this->request->get('term', '');

        $persons = $this->model->where('name', 'LIKE', '%' . $query . '%')->get();

        if (count($persons)) {
            return response()->json($persons);
        }
        return response()->json('',204);//O servidor processou a solicitação com sucesso, mas não é necessário nenhuma resposta.
//        else {
//            return ['value' => 'No Result Found', 'id' => ''];
//        }
    }

    public function autocompleteDocument()
    {
        $query = $this->request->get('term', '');

        $persons = $this->model->where('document', 'LIKE', '%' . $query . '%')->get();

        if (count($persons)) {
            return response()->json($persons);
        }
        return response()->json('',204);//O servidor processou a solicitação com sucesso, mas não é necessário nenhuma resposta.
//        else {
//            return ['value' => 'No Result Found', 'id' => ''];
//        }
    }
}