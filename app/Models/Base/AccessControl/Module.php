<?php

namespace App\Models\Base\AccessControl;

use App\Models\Base\Company\Company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Module extends Model
{
    protected $table = 'modules';
    protected $fillable = [
        'name','database'
    ];

    /**
     * @return array
     */
    public function rules (){
        return [
            'name'=>'required|min:4|unique:modules,name,[id]',
            'database'=>'required|min:4'
        ];
    }

    /**
     * @param $value
     */
    public function setDatabaseAttribute($value)
    {
        $this->attributes['database'] = Str::slug($value,'_');
    }

    public function permission(){
        return $this->hasOne(User::class,'physical_id','id');
    }

    public function companies(){
        return $this->belongsToMany(Company::class, 'company_modules', 'module_id', 'company_id');
    }
}
