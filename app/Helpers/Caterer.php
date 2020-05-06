<?php


namespace App\Helpers;

use App\Models\Core\People\People;

/**
 * Classe responsavel por tratar os dados dos fornecedores para os modulos
 *
 * Class Caterer
 * @package App\Helpers
 */
class Caterer
{
    /**
     * obj Intallers
     *
     * @var Physical
     */
    private $people;

    /**
     * Installer constructor.
     */
    public function __construct()
    {
        $this->people = new People;
    }

    /**
     * Buscar todos os fornecedores
     *
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public static function getAllCaterers()
    {
        $query = (new static)->people->getCaterers();

        return $query->get();
    }

    /**
     * Buscar os Fornecedores ativos
     *
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public static function getActiveCaterers()
    {
        $query = (new static)->people->getCaterers();

        $query->where('deleted_at',null);

        return $query->get();
    }

    /**
     * Buscar os instaladores desativados
     *
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public static function getDisabledCaterers()
    {
        $query = (new static)->people->getCaterers();
        $query->onlyTrashed();
        return $query->get();
    }

    /**
     * Busca o fornecedor por ID
     *
     * @param $id
     * @return mixed
     */
    public static function findCaterer($id)
    {
        $data = People::find($id);
        return $data;
    }
}
