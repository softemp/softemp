<?php

namespace App\Models\Provedor;

use Illuminate\Database\Eloquent\Model;

/**
 * Sistema para corrigir o bloqueio de clientes do MkAuth 19.01
 *
 * Class MkBlock
 * @package App\Models\Provedor
 */
class MkBlock extends Model
{
    protected $connection = 'mysql_provedor';
    protected $table = 'mk_blocks';

    protected $fillable = [
        'login', 'cpf_cnpj', 'ip', 'ramal'
    ];

    protected $hidden = ['created_at','updated_at'];
}
