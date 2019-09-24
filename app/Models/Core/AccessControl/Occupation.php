<?php

namespace App\Models\Core\AccessControl;

use App\Models\Core\People\Physical;
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
        'name', 'cbo2002', 'description','role_id'
    ];

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

    /**
     * @return array
     */
    public function messages(){
        return [
           'name.unique'=>'Esta Ocupação ja existe.'
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
            'description'=>'nullable|max:191',
        ];
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role(){
        return $this->belongsTo(Role::class,'role_id','id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function physicals(){
        return $this->belongsToMany(Physical::class, 'occupation_physical','occupation_id','physical_id');
    }
}
