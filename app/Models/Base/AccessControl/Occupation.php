<?php

namespace App\Models\Base\AccessControl;

use App\Models\ValidateTrait;
use Illuminate\Database\Eloquent\Model;

class Occupation extends Model
{
    use ValidateTrait;

    protected $table = 'occupations';

    protected $fillable = [
        'name', 'description', 'role_id'
    ];

    /**
     * @return array
     */
    private function rulesStore()
    {
        return [
            'name'=>'required|min:3|unique:occupations',
            'description'=>'',
            'role_id'=>'required',
        ];
    }

    /**
     * @param $id
     * @return array
     */
    private function rulesUpdate($id)
    {
        return [
            'name'=>'required|min:3|unique:occupations,name,'.$id,
            'description'=>'',
        ];
    }

    public function role(){
        return $this->belongsTo(Role::class,'role_id','id');
    }
}
