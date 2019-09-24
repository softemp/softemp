<?php

namespace App\Http\Controllers\SoftEmp\WebSite;

use CoffeeCode\Optimizer\Optimizer;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Redirect;

/**
 * Class CrudController
 * @package App\Http\Controllers\SoftEmp\Panel
 */
class CrudController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $model;
    protected $request;
    protected $pathView;
    protected $groupRoute;
    protected $redirect;
    protected $optMeta;

    /**
     * array com retorno nos metodos index, create, edit, show
     *
     * @var array
     */
    protected $arrayData = [];

    /**
     * CrudController constructor.
     * @param object $model
     * @param string $groupRoute
     * @param string $pathView
     */
    public function __construct(object $model, $request, string $groupRoute, string $pathView)
    {
        $this->optMeta = new Optimizer();
        $this->arrayData['opt'] = '';
        $this->model = $model;
        $this->request = $request;
        $this->pathView = $pathView;
        $this->groupRoute = $groupRoute;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->arrayData['data'] = $this->model->all();
        return view("$this->pathView.index", $this->arrayData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("{$this->pathView}.create", $this->arrayData);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        if(!method_exists($this->model,'validateStore')) {
            $validateData = $this->request->validate($this->model->rules());

        }else {
            $validateData = $this->model->validateStore($this->request, $this->groupRoute . '.create', $this->model->messages());

            if (!is_array($validateData)){
                return $validateData;
            }
        }

//        $obj = $this->model;
//        $obj->fill($validateData);
//        $result = $obj->save();
        $result = $this->model->create($validateData);

        //se deu tudo certo redireciona para para rota index
        if ($result) {
            if ($this->redirect==='edit'){
                $redirect = redirect()->route("{$this->groupRoute}.edit",$result->id)->with('success', trans('panel/crud.msg_created_sucess'));
            }else {
                $redirect = redirect()->route("{$this->groupRoute}.index")->with('success', trans('panel/crud.msg_created_sucess'));
            }

            return $redirect;
        }

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
        $this->arrayData['data'] = $this->model->find($id);

        if ($this->arrayData['data']) {
//            return response()->json($data, 200);
            return view("{$this->pathView}.show", $this->arrayData);
        }

        $this->arrayData = ['message' => 'Registro não encontrado!', 404];

        return response()->json($this->arrayData);
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

        if ($data) {

            $this->arrayData['data'] = $data;
            return view("{$this->pathView}.edit", $this->arrayData);
        }

        return redirect()->route("{$this->groupRoute}.index")->withErrors(['errors' => 'Registro não encontrado!']);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($id)
    {
        if(!method_exists($this->model,'validateUpdate')) {
            $validateData = $this->request->validate($this->prepareRuleValidate($this->model->rules(), $id));
        }else {
            $validateData = $this->model->validateUpdate($this->request, $this->groupRoute . '.edit', $id, $this->model->messages());

            if (!is_array($validateData)){
                return $validateData;
            }
        }

        $obj = $this->model->find($id);
        $obj->update($validateData);
        $result = $obj->save();

        if ($result) {
            return redirect()->route("{$this->groupRoute}.index")->with('success',
                trans('panel/crud.msg_updated_sucess'));
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
            return Redirect::route("{$this->groupRoute}.index")->with('success', trans('panel/crud.msg_restored_sucess'));
        } catch (UserNotFoundException $e) {
            // Redirect to the user management page
            return Redirect::route("{$this->groupRoute}.index")
                ->withErrors(['errors' => trans('panel/crud.msg_updated_error')])
                ->withInput();
        }
    }

    /**
     * metodo que adiciona o id do registro para fazer update nos compos UNIQUE
     *
     * @param $ruleValidate
     * @param bool $id
     * @return mixed
     */
    protected function prepareRuleValidate($ruleValidate, $id = false)
    {
        if ($id) {
            foreach ($ruleValidate as $key => &$value) {
                $ruleValidate[$key] = str_replace('[id]', $id, $value);
            }
        }
        return $ruleValidate;
    }

    /**
     * método de redirecionamento
     *
     * @param $page
     * @param array|null $arrayNotification
     * @param null $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirect($page, array $arrayNotification = null, $id = null)
    {
        return redirect()->route("$this->groupRoute.$page", $id)->with($arrayNotification);
    }
}
