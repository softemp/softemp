<?php


namespace App\Models;


use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\Types\Object_;

trait ValidateTrait
{
    /**
     * @param $request
     * @param $route rota de retorno
     * @return \Illuminate\Http\RedirectResponse
     */
    public function validateStore($request, $route, $messages = null)
    {
        $data = $request->all();

        $validator = Validator::make($data, $this->rulesStore(), $messages);

        if ($validator->fails()) {
            return redirect()->route($route)
                ->withErrors($validator)
                ->withInput();
        }
        return $data;
    }

    /**
     * @param $request object
     * @param $route
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function validateUpdate($request, $route, string $id, array $messages = [])
    {
        $data = $request->all();

        $validator = Validator::make($data, $this->rulesUpdate($id), $messages);
        //$validator = Validator::make($data, $this->rulesUpdate($id))->validate();

        if ($validator->fails()) {
            return redirect()->route($route, $id)
                ->withErrors($validator)
                ->withInput();
        }

        return $data;
    }
}
