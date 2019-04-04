<?php

namespace App\Models\StockControl;

use Illuminate\Database\Eloquent\Model;

class EquipmentModel extends Model
{
    protected $connection = 'mysql_stockcontrol';
    protected $table = 'equipment_models';
    protected $guarded = [];

    public function rules (){
        return [
            'name' => '',
        ];
    }

    /**
     * @return array
     */
    public function messages (){
        return [];
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
