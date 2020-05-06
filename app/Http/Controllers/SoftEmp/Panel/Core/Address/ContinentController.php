<?php

namespace App\Http\Controllers\SoftEmp\Panel\Core\Address;

use App\Http\Controllers\SoftEmp\Panel\CrudController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Core\Address\Continent;
use App\Http\Validators\Address\ContinentsValidator;

class ContinentController extends CrudController {

    /**
     * path file views
     *
     * @var type
     */
    protected $pathView = 'softemp.panel.core.address.continent';
    protected $groupRoute = 'panel.address.continent';

    /**
     * ContinentsController constructor.
     * @param Continent $continents
     * @param Request $request
     * @param ContinentsValidator $validator
     */
    public function __construct(Continent $model, Request $request) {
//        $this->request = $request;
//        $this->validator = $validator;

        parent::__construct($model, $request, $this->groupRoute, $this->pathView);
}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //verifica se existe a permission
        if (Gate::denies('continent-view')) {
            return response()->json(['message' => 'not permission'], 401);
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
        if (Gate::denies('continent-create')) {
            return response()->json(['message' => 'not permission'], 401);
        }

        return parent::create();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //verifica se existe a permission
        if (Gate::denies('continent-create')) {
            return response()->json(['message' => 'not permission'], 401);
        }

        return parent::store();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    public function show($id)
//    {
//        //
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    public function edit($id)
//    {
//        //
//    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        //verifica se existe a permission
        if (Gate::denies('continent-update')) {
            return response()->json(['message' => 'not permission'], 401);
        }

        return parent::update($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //verifica se existe a permission
        if (Gate::denies('continent-destroy')) {
            return response()->json(['message' => 'not permission'], 401);
        }
        return parent::destroy($id);
    }
}
