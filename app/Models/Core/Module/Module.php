<?php

namespace App\Models\Core\Module;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $table = 'modules';

    protected $fillable = [
        'name', 'database'
    ];

    public function rules($id){
        return [
            'name'=>'required|unique:modules,name,'.$id,
            'database'=>'required'
        ];
    }
}
