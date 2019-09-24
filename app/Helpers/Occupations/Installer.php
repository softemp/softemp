<?php


namespace App\Helpers\Occupations;


use App\Models\Core\AccessControl\Occupation;
use App\Models\Core\People\Physical;
use Illuminate\Database\Query\Builder;

class Installer
{

    private $physical;

    public function __construct()
    {
        $this->physical = new Physical;
    }

    /**
     * Buscar todos os instaladores
     *
     * @return mixed
     */
    public static function getAllInstallers()
    {
        $query = (new static)->physical->getInstallers();

        $query->whereHas('people', function ($query3) {
            $query3->withTrashed();
        });

        return $query->get();
    }

    public static function getActiveInstallers()
    {
        $query = (new static)->physical->getInstallers();

        $query->whereHas('people', function ($query3) {
            $query3->where('deleted_at',null);
        });

        return $query->get();
    }

    public static function getDisabledInstallers()
    {
        $query = (new static)->physical->getInstallers();

        $query->whereHas('people', function ($query3) {
            $query3->onlyTrashed();
        });

        return $query->get();
    }

    /**
     * Busca o instalador por ID
     *
     * @param $id
     * @return mixed
     */
    public static function findInstallers($id)
    {
        $installer = Physical::find($id);
        return $installer;
    }
}
