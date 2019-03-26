<?php

namespace App\Http\Controllers\SoftEmp;

use App\Http\Validators\Contacts\ContEmailValidator;
use App\Http\Validators\Contacts\ContPhoneValidator;
use App\Models\Contacts\ContEmail;
use App\Models\Contacts\ContPhone;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Redirect;

/**
 * Class CrudController
 * Grud para tarefas simples
 *
 * @data 2018/01/06
 * @autor Paulo Roberto da Silva<paulo@softemp.com.br>
 *
 * @package App\Http\Controllers\SoftEmp
 */
class CrudController extends BaseController
{

    use AuthorizesRequests,
        DispatchesJobs,
        ValidatesRequests;

    protected $request;
    /**
     * name da model responsavel por este controller.
     *
     * @var type
     */
    protected $model;
    /**
     * Classe de validação
     * @var
     */
    protected $validator;
    /**
     * id de retorno para o method update
     *
     * @var null
     */
    protected $return_id = null;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // pega os dados do model
        $data = $this->model->all();

        return view("{$this->pathView}.index", compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //carega a view
        return view("{$this->pathView}.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //retrieves the data from the form
        $dados = $this->request->all();
        $validator = validator($dados, $this->validator->rulesStore());
        if ($validator->fails()) {
            return redirect()->route("{$this->groupRoute}.create")
                ->withErrors($validator)
                ->withInput();
        }
        //does the insert in the bank
        $result = $this->model->create($dados);
        //se deu tudo certo redireciona para para rota index
        if ($result) {
            if ($this->redirect='edit'){
                $redirect = redirect()->route("{$this->groupRoute}.edit",$result->id)->with('success', trans('panel/crud.msg_created_sucess'));
            }else {
                $redirect = redirect()->route("{$this->groupRoute}.index")->with('success', trans('panel/crud.msg_created_sucess'));
            }

            return $redirect;
        }
        //ou retorna para view create
        return redirect()->route("{$this->groupRoute}.create")
            ->withErrors(['errors' => trans('panel/crud.msg_created_error')])
            ->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //procura o registro referenten ao id
        $data = $this->model->find($id);

        //se não encontrar
        if (!$data) {
            return redirect()->route("{$this->groupRoute}.index")
                ->withErrors(['errors' => trans('panel/crud.msg_record_not_found')])
                ->withInput();
        }
        //se existir
        return view("{$this->pathView}.show", compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->model->find($id);

        return view("{$this->pathView}.edit", compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $dados = $this->request->all();
        $model = $this->model->find($id);
        $validator = validator($dados, $this->validator->rulesUpdate($model->id));
        $id = $this->return_id ? $this->return_id : $id;
        if ($validator->fails()) {
            return redirect()->route("{$this->groupRoute}.edit", [$id])
                ->withErrors($validator)
                ->withInput();
        }
        $update = $model->update($dados);
        if ($update) {
            return redirect()->route("{$this->groupRoute}.index")->with('success', trans('panel/crud.msg_updated_sucess'));
        }
        return redirect()
            ->route("{$this->groupRoute}.edit", ['id' => $id])
            ->withErrors(['errors' => trans('panel/crud.msg_updated_error')])
            ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        try {
            $removed = $this->model->find($id);
            $result = $removed->delete();
            
            return 1;
        } catch (QueryException $e) {
            return response()->json(['message' => $e->errorInfo], 424);
        }
    }

    /**
     * Restore a deleted user.
     *
     * @param  int $id
     * @return Redirect
     */
    public function restore($id = null)
    {
        try {
            // Get user information
            $user = $this->model->withTrashed()->find($id);

            // Restore the user
            $user->restore();

            // Redirect to the user management page
            return Redirect::route("{$this->groupRoute}.index")->with('success',
                trans('panel/crud.msg_restored_sucess'));
        } catch (UserNotFoundException $e) {
            // Redirect to the user management page
            return Redirect::route("{$this->groupRoute}.index")
                ->withErrors(['errors' => trans('panel/crud.msg_updated_error')])
                ->withInput();
        }
    }

}