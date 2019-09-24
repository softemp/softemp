<?php


namespace App\Helpers\Occupations;


use App\Models\Core\People\Physical;

/**
 * Classe responsavel por tratar os dados dos instaladores
 *
 * Class Installer
 * @package App\Helpers\Occupations
 */
class Installer
{
    /**
     * obj Intallers
     *
     * @var Physical
     */
    private $physical;

    /**
     * Installer constructor.
     */
    public function __construct()
    {
        $this->physical = new Physical;
    }

    /**
     * Buscar todos os instaladores
     *
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public static function getAllInstallers()
    {
        $query = (new static)->physical->getInstallers();

        $query->whereHas('people', function ($query3) {
            $query3->withTrashed();
        });

        return $query->get();
    }

    /**
     * Buscar os instaladores ativos
     *
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public static function getActiveInstallers()
    {
        $query = (new static)->physical->getInstallers();

        $query->whereHas('people', function ($query3) {
            $query3->where('deleted_at',null);
        });

        return $query->get();
    }

    /**
     * Buscar os instaladores desativados
     *
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
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
    public static function findInstaller($id)
    {
        $installer = Physical::find($id);
        return $installer;
    }
}
