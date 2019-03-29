<?php

namespace App\Models\Base\AccessControl;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';

    public function module(){
        return $this->belongsTo(Module::class,'id','module_id');
    }

    public function roles(){
        return $this->belongsToMany(Role::class, 'role_permissions', 'permission_id', 'role_id');
    }
}
