<?php

namespace App\Models\Base\AccessControl;

use App\Models\ValidateTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Permission extends Model
{
    use ValidateTrait;

    protected $table = 'permissions';

    protected $fillable = [
        'name', 'slug', 'description', 'module_id'
    ];

    /**
     * @return array
     */
    public function rules (){
        return [
            'name'=>'required|min:3|unique:permissions,name,[id]',
            'slug'=>'',
            'description'=>'',
            'module_id'=>'required',
        ];
    }

    /**
     * validação dos dados de um novo registro.
     *
     * @return array
     */
    private function rulesStore()
    {
        return [
            'name'=>'required|min:3|unique:permissions',
            'slug'=>'',
            'description'=>'',
            'module_id'=>'required',
        ];
    }

    private function rulesUpdate($id)
    {
        return [
            'name'=>'required|min:3|unique:permissions,name,'.$id,
            'description'=>'',
        ];
    }

    /**
     * @return array
     */
    public function messages (){
        return [];
    }

    /**
     * @param $value
     */
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }

    public function module(){
        return $this->belongsTo(Module::class,'module_id','id');
    }

    public function roles(){
        return $this->belongsToMany(Role::class, 'role_permissions', 'permission_id', 'role_id');
    }
}
