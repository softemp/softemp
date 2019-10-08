<?php


namespace App\Models\Provedor\MkAuth\Radius;


use Illuminate\Database\Eloquent\Model;

class Nas extends Model
{
    protected $connection = 'mysql_mkauth';

    protected $table = 'nas';

    public function getNas(){
        return $this->select(['nasname','shortname'])->where('tipo','rb')->get();
    }

}
