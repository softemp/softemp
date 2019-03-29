<?php

namespace App\Models\Base\AccessControl;

use Illuminate\Database\Eloquent\Model;

class Occupation extends Model
{
    protected $table = 'occupations';

    protected $fillable = [
        'name', 'description', 'role_id'
    ];

    /**
     * @return array
     */
    public function rules (){
        return [
            'name'=>'required|min:4|unique:occupations,name,[id]',
            'description'=>'',
            'role_id'=>'',
        ];
    }

    /**
     * @return array
     */
    public function messages (){
        return [];
    }

    public function role(){
        return $this->belongsTo(Role::class,'role_id','id');
    }


}
