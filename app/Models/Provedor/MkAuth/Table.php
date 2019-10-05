<?php

namespace App\Models\Provedor\MkAuth;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Table extends Model
{
    protected $connection = 'mysql_mkauth';

    //protected $table = 'sis_suporte';

    public $timestamps = false;

    protected $fillable = [
        'login_atend','msg'
    ];

    /**
     * @return array
     */
    private function showTables(){
        return DB::connection('mysql_mkauth')->select('SHOW TABLES');
    }

    /**
     * @param $table
     * @return array
     */
    private function showColumns($table){
        return DB::connection('mysql_mkauth')->select("SHOW COLUMNS FROM {$table}");
    }

    /**
     * @return array
     */
    public function tables()
    {
        $tables = $this->showTables();

        foreach ($tables as $table){
            $tabelas[] =$table->Tables_in_mkradius;
        }
        return $tabelas;
    }

    /**
     * @param $tabel tabela para a qual as colunas vão ser listadas
     * @return array
     */
    public function columns($tabel){
        $columns = $this->showColumns($tabel);
        foreach ($columns as $column){
            $coluna[]=$column->Field;
        }
        return $coluna=['columns'=>$coluna];
    }
}
