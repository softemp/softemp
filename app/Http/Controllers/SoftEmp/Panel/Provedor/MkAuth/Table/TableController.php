<?php

namespace App\Http\Controllers\SoftEmp\Panel\Provedor\MkAuth\Table;

use App\Models\Provedor\MkAuth\Table;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class TableController extends Controller
{

    protected $pathView = 'softemp.panel.provedor.mkauth.table';
    protected $groupRoute = 'softemp.panel.provedor.mkauth.table';

    private $model;

    public function __construct(Table $table)
    {
        $this->model = $table;
    }

    public function index()
    {
        $data = $this->model->tables();

        return view("{$this->pathView}.index",compact('data'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function index()
//    {
//        $tables = $this->model->tables();
//
//        if($tables){
//            foreach ($tables as $table){
//                echo "<b>{$table->Tables_in_mkradius}</b></br>";
//
//                echo "<pre>";
//                print_r($this->columTable($table->Tables_in_mkradius));
//                echo "</pre>";
//            }
//        }


   // }



    /**
     * @param $tabel
     * @return array
     */


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($table)
    {
        return $this->model->columns($table);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
