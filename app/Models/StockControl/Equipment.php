<?php

namespace App\Models\StockControl;

use App\Models\ValidateTrait;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Equipment extends Model
{

    use ValidateTrait;
    protected $connection = 'mysql_stockcontrol';
    protected $table = 'equipment';
//    protected $guarded = [];

    protected $fillable =[
        'equipment_model_id','ns','mac','purchase_date', 'status'
    ];




    public function rulesStore (){
        return [
            'equipment_model_id' => 'required',
            'ns'=>'required|unique:mysql_stockcontrol.equipment|min:10|max:20',
            'mac'=>'required|min:10|max:20',
            'purchase_date'=>'required|date|',
            'status' => '',
        ];
    }

    private function rulesUpdate ($id){
        return [
            'ns'=>'required|min:10|max:20|unique:mysql_stockcontrol.equipment,ns,'.$id,
            'mac'=>'required|min:10|max:20',
            'purchase_date'=>'required|date',
        ];
    }


    /**
     * @return array
     */
    public function messages (){
        return [
            'equipment_model_id.required' => 'O modelo de equipamento é obrigatório',
            'ns.required' => 'Número de série é obrigatório',
            'ns.unique' => 'Já existe um equipamento com esse número de série registrado no sistema',
            'ns.min' => 'Número de série deve ter pelo menos 10 maractéres',
            'ns.max' => 'Número de série não deve ter mais do que 20 caractéres',
            'mac.required' => 'O Mac do equipamento deve ser preenchido',
            'mac.min' => 'Mac do equipamento deve ter pelo menos 10 caractéres',
            'mac.max' => 'Mac não deve ter mais do que 20 caractéres',
            'purchase_date.required' => 'A data de compra do equipamento é de preenchimento obrigatório',
        ];
    }

    /**
     * Ligação entre as tabelas equipamentos e ordens
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function equipmentOrders()
    {
        return $this->belongsToMany(OrderOut::class, 'order_out_equipment', 'equipment_id', 'order_out_id')->withPivot('oestatus', 'id');
    }

    /**
     * Ligação entre as tabelas equipamentos e modelos de equipamentos
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function equipmentModel()
    {
        return $this->belongsTo(EquipmentModel::class, 'equipment_model_id', 'id');
    }

    /**
     * Busca os destinos dados aos equipamentos
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function destinations()
    {
        return $this->hasMany(equipmentDestination::class, 'equipment_id', 'id');
    }

    /**
     * Busca o ultimo destino dado ao equipamento
     * @return Model|\Illuminate\Database\Eloquent\Relations\HasMany|object|null
     */
    public function lastDestination()
    {
        return $this->destinations()->latest()->first();
    }

    /**
     * Retorna os equipamentos no estoque
     * @return mixed
     */
    public function showStock()
    {
        return Equipment::where('status', 1)->get();
    }

    /**
     * Retorna os equipamentos em ordens abertas
     * @return mixed
     */
    public function showInOrder()
    {
        return Equipment::where('status', 2)->get();
    }

    /**
     * Retorna os equipamentos sendo usados pelos clientes
     * @return mixed
     */
    public function showBeingUsed()
    {
        return Equipment::where('status', 3)->get();
    }

    /**
     * Retorna os equipamentos movidos para o lixo
     * @return mixed
     */
    public function showTrash()
    {
        return Equipment::where('status', 4)->get();
    }

    /**
     * Recebe o id do equipamentos e move para o estoque
     * @param $id
     * @return mixed
     */
    public function putStock($id)
    {
        if (Equipment::find($id)->update(['status' => 1]))
            return true;
        else

            return false;
    }

    /**
     *Recebe o id do equipamento e seta status do equipamento em ordem de saída
     * @param $id
     * @return mixed
     */
    public function putOrder($id)
    {
        return Equipment::find($id)->update(['status'=> 2]);
    }

    /**
     * Recebe o id do equipamento e seta o status como equipamento em cliente
     * @param $id
     * @return mixed
     */
    public function putClient($id)
    {
        return Equipment::find($id)->update(['status' => 3]);
    }

    /**
     * Recebe o id do equipamento e seta o status do equipamento como equipamento no lixo
     * @param $id
     * @return mixed
     */
    public function putTrash($id)
    {
        return Equipment::find($id)->update(['status' => 4]);
    }

    /**
     * Recebe o request e exclui a pontuação gráfica e transforma as letras em maiúsculas
     *
     * @param $obj
     * @return mixed
     */
    public function validateMacNs($obj)
    {
        $replace = array('-', '/', ':', ';', '.', ',', ')', '(', '=');
        $change = array('o', 'O');

        $obj->mac = strtoupper($obj->mac);
        $obj->mac = str_replace($replace, '', $obj->mac);
        $obj->mac = str_replace($change, "0", $obj->mac);
        $obj['mac'] = $obj->mac;

        $obj->ns = strtoupper($obj->ns);
        $obj->ns = str_replace($replace, "", $obj->ns);
        $obj->ns = str_replace($change, "0", $obj->ns);
        $obj['ns'] = $obj->ns;

        return $obj;
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }
}
