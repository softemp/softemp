<?php

namespace App\Models\Base\Company;

use App\Models\Base\AccessControl\Module;
use App\Models\Base\User\User;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /**
     * @var string
     */
    protected $table = 'companies';

    /**
     * A variável fillable define quais os campos que podem ser inseridos pelo usuário do sistema no Banco.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * o campo guarded protege os campos de inserções. Ele impede que alguém insira dados em alguns campos da nossa tabela.
     *
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'update_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users(){
        return $this->belongsToMany(User::class, 'company_users', 'company_id', 'user_id')->withTimestamps();
    }

    public function modules(){
        return $this->belongsToMany(Module::class, 'company_modules', 'company_id', 'module_id')->withTimestamps();
    }

}
