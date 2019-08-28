<?php

namespace App\Models\Core\AccessControl;

use App\Models\ValidateTrait;
use Illuminate\Database\Eloquent\Model;

class Occupation extends Model
{
    use ValidateTrait;

    protected $table = 'occupations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'description','role_id'
    ];

//    public function rules()
//    {
//        return [
//            'name'=>'required|min:3|max:191|unique:occupations',
//            'description'=>'nullable|max:191',
//            'role_id'=>'required',
//        ];
//    }

    /**
     * @return array
     */
    private function rulesStore()
    {
        return [
            'name'=>'required|min:3|max:191|unique:occupations',
            'description'=>'nullable|max:191',
            'role_id'=>'required',
        ];
    }

    public function messages(){
        return [];
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role(){
        return $this->belongsTo(Role::class,'role_id','id');
    }
}
