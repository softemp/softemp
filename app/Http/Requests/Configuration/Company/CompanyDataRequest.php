<?php

namespace App\Http\Requests\Configuration\Company;

use Illuminate\Foundation\Http\FormRequest;

class CompanyDataRequest extends FormRequest
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
            'fantasy_name'=>'required',
            'business_name'=>'required',
            'document'=>'required',
//            'document_2'=>'required',
            'person_id'=>''
        ];
    }
}
