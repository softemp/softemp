<?php

namespace App\Models\Provedor\MkAuth;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

/**
 * Classe responsavel por gerenciar os clientes do MkAuth
 *
 * Class Client
 * @package App\Models\Provedor\MkAuth
 */
class Client extends Model
{
    protected $connection = 'mysql_mkauth';

    protected $table = 'sis_cliente';

    protected $fillable = ['name', 'login', 'ip', 'ramal'];

    protected $perPage = 10;

    /**
     * Buscar clientes ativos
     *
     * @return mixed
     */
    public function getActive(){
        return $this->where('cli_ativado', 's');
    }

    /**
     * Buscar clientes liberados
     * @return mixed
     */
    public function getFree(){
        return $this->where('cli_ativado', 's')->where('bloqueado', 'nao');
    }

    /**
     * Buscar clientes bloqueados mas ativos
     *
     * @return mixed
     */
    public function getBlocked(){
        return $this->where('cli_ativado', 's')->where('bloqueado', 'sim');
    }

    /**
     * buscas clientes desativados
     *
     * @return mixed
     */
    public function getDisabled(){
        return $this->where('cli_ativado', 'n');
    }

    /**
     * @return mixed
     */
    public function countActive(){
        return $this->getActive()->count();
    }

    /**
     * @return mixed
     */
    public function countBlocked(){
        return $this->getBlocked()->count();
    }
}
