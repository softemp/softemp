<?php

namespace App\Models\StockControl;

use App\Models\ValidateTrait;
use Illuminate\Database\Eloquent\Model;

class EquipmentModel extends Model
{
    use ValidateTrait;

    protected $connection = 'mysql_stockcontrol';
    protected $table = 'equipment_models';
    protected $fillable = [
        'name'
    ];

    public function rulesStore (){
        return [
            'name' => 'required|unique:mysql_stockcontrol.equipment_models|min:5|max:50',
        ];
    }

    public function rulesUpdate ($id){
        return [
            'name' => 'required|min:5|max:50|unique:mysql_stockcontrol.equipment_models,name,'.$id,
        ];
    }

    /**
     * @return array
     */
    public function messages (){
        return [
            'name.required' => 'Campo nome deve ser preenchido'
        ];
    }

    public function equipments()
    {
        return $this->hasMany(Equipment::class, 'equipment_model_id', 'id');
    }

    public function inStock()
    {
        return $this->equipments()->where('status', 1);
    }

//    public function show($id)
//    {
//        return EquipmentModel::find($id);
//    }
//
//    public function showAll()
//    {
//        return EquipmentModel::get();
//    }
//
//    public function insert($request)
//    {
//        return EquipmentModel::create([
//            'name' => $request->name
//        ]);
//    }
//
//   public function alter($id, $request)
//   {
//       return EquipmentModel::find($id)->update([
//           'name' => $request->name
//       ]);
//   }
//
//   public function remove($id)
//   {
//       return EquipmentModel::destroy($id);
//   }


}
