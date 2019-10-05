<?php

namespace App\Models\Provedor\MkAuth;

use Illuminate\Database\Eloquent\Model;

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

    /**
     * Buscar clientes ativos
     *
     * @return mixed
     */
    public function getActive(){
        return $this->where('cli_ativado', 's')->get();
    }

    /**
     * Buscar clientes bloqueados mas ativos
     *
     * @return mixed
     */
    public function getBlocked(){
        return $this->where('cli_ativado', 's')->where('bloqueado', 'sim')->get();
    }

    /**
     * buscas clientes desativados
     *
     * @return mixed
     */
    public function getDisabled(){
        return $this->where('cli_ativado', 'n')->get();
    }
}
