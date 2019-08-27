<?php

namespace App\Http\Controllers\SoftEmp\Panel\Core\Address;

use App\Http\Validators\Address\CityValidator;
use App\Http\Validators\Address\NeighboarhoodValidator;
use App\Http\Validators\Address\StreetValidator;
use App\Models\Core\Address\City;
use App\Models\Core\Address\Neighboarhood;
use App\Models\Core\Address\Street;
use App\Models\Core\Address\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\SoftEmp\CrudController;

class StreetsController extends CrudController {

    /**
     * path file views
     *
     * @var type
     */
    protected $nameView = 'softemp.panel.address.streets';

    /**
     * route basic
     *
     * @var type
     */
    protected $route = 'panel.address.streets';
    private $neighboarhood;

    /**
     * StreetsController constructor.
     * @param Street $model
     * @param Request $request
     * @param StreetValidator $validator
     * @param Neighboarhood $neighboarhood
     */
    public function __construct(Street $model, Request $request, StreetValidator $validator, Neighboarhood $neighboarhood) {
        $this->model = $model;
        $this->request = $request;
        $this->validator = $validator;
        $this->neighboarhood = $neighboarhood;
    }

    public function getStreet(){
        $data = [];
        if($this->request->has('neighboarhood')&&$this->request->has('street')){
            $neighboarhood_id = $this->request->neighboarhood;
            $search = $this->request->street;
            $data = $this->model->select("id","name")
                ->whereNeighboarhoodId($neighboarhood_id)
                ->where('name','LIKE',"%$search%")
                ->get();
        }
        return response()->json($data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //verifica se existe a permission
        if (Gate::denies('address.street-view')) {
            return redirect()->back()->with('error', trans('grud.msg_permission_denied'));
        }

        return parent::index();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //verifica se existe a permission
        if (Gate::denies('street-create')) {
            return redirect()->back()->with('error', trans('grud.msg_permission_denied'));
        }
        //pegando as Cidades
        $neighboarhoods = $this->neighboarhood->all();

        return view("{$this->nameView}.create", compact('neighboarhoods'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->model->find($id);
        $neighboarhoods = $this->neighboarhood->all();

        return view("{$this->nameView}.edit", compact('data','neighboarhoods'));
    }
}
