<?php


namespace App\Models;


use Illuminate\Support\Facades\Validator;

trait ValidateTrait
{
    /**
     * @param $request
     * @param $route rota de retorno
     * @return \Illuminate\Http\RedirectResponse
     */
    public function validateStore($request, $route)
    {
        $data = $request->all();

        $validator = Validator::make($data, $this->rulesStore());

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
    public function validateUpdate($request, $route, $id = null)
    {
        $data = $request->all();

        $validator = Validator::make($data, $this->rulesUpdate($id));

        if ($validator->fails()) {
            return redirect()->route($route, [$id])
                ->withErrors($validator)
                ->withInput();
        }

        return $data;
    }
}