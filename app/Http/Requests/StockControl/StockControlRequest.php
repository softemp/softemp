<?php

namespace App\Http\Requests\StockControl;

use Illuminate\Foundation\Http\FormRequest;

class StockControlRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'equipment_model_id' => 'required',
            'ns'=>'required|unique:mysql_stockcontrol.equipment|min:10|max:20',
            'mac'=>'required|min:10|max:20',
            'purchase_date'=>'required',
            'status' => '',
        ];
    }

    public function messages (){
        return [
            'purchase_date'   => 'A data de compra do equipamento é obrigatório',
            'mac.required'                   =>  'Número de série é de preenchimento obrigatório'
        ];
    }
}
