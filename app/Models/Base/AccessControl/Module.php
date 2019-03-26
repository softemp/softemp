<?php

namespace App\Models\Base\AccessControl;

use App\Models\Base\Company\Company;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    /**
     * @var string
     */
    protected $table = 'modules';

    public function permission(){
        return $this->hasOne(User::class,'physical_id','id');
    }

    public function companies(){
        return $this->belongsToMany(Company::class, 'company_modules', 'module_id', 'company_id');
    }
}
