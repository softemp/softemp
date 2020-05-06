<?php

namespace App\Http\Controllers\SoftEmp\Panel\Core\Address;

use App\Http\Controllers\SoftEmp\Panel\CrudController;
use App\Models\Core\Address\Address;
use App\Models\Core\Address\AddressType;
use App\Models\Core\Address\City;
use App\Models\Core\Address\Country;
use App\Models\Core\Address\Neighboarhood;
use App\Models\Core\Address\State;
use App\Models\Core\Address\Street;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AddressController extends CrudController {

    /**
     * path file views
     *
     * @var type
     */
    protected $pathView = 'softemp.panel.address.address';
    protected $groupRoute = 'panel.address.address';

    private $addressType;
    private $street;
    private $neighboarhood;
    private $city;
    private $state;
    private $country;

    /**
     * AddressController constructor.
     * @param Address $model
     * @param Request $request
     * @param AddressValidator $validator
     * @param Street $street
     */
    public function __construct(Address $model, Request $request, AddressType $addressType,
                                Country $country, State $state, City $city, Neighboarhood $neighboarhood, Street $street) {
        $this->addressType = $addressType;
        $this->street = $street;
        $this->neighboarhood = $neighboarhood;
        $this->city = $city;
        $this->state = $state;
        $this->country = $country;

        parent::__construct($model, $request, $this->groupRoute, $this->pathView);
    }

    public function create()
    {
        $countries = $this->country->all();
        $states = $this->state->all();
        $cities = $this->city->all();
        $neighboarhoods = $this->neighboarhood->all();
        $streets = $this->street->all();
        $addressTypes = $this->addressType->all();

        return view("{$this->nameView}.create",compact('countries','states','cities','neighboarhoods','streets','addressTypes'));

    }

//    public function getEdit($id){
//        $address['address'] = $this->model->find($id);
//        $address['addressType'] = $this->model->find($id)->addressTypes;
//        $address['addressTypes'] = $this->addressType->all();
//        $address['street'] = $this->model->find($id)->addressStreets;
//        return response()->json($address,200);
//    }
    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function statusDisable($id){
        $address = $this->model->find($id);
        $address->update(['principal' => '0']);
        $update = $address->update(['status'=>'0']);
        return response()->json($update,200);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function statusActivate($id){
        $address = $this->model->find($id);
        $update = $address->update(['status'=>'1']);
        return response()->json($update,200);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function mainDefine($id){
        $address= $this->model->find($id);
        $address->update(['principal' => '1']);
        $update = $this->model
            ->where('principal', $address->person_id)
            ->where('id','!=', $id)
            ->update(['principal' => '0']);
        return response()->json($update,200);
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response|int|string
     */
    public function destroy($id){
        try {
            $removed = $this->model->find($id);
            if(!$removed->status) {
                $result = $removed->delete();
                return 1;
            }
            return 'Desative o endereço primeiro';
        } catch (QueryException $e) {
            return response()->json(['message' => $e->errorInfo], 424);
        }
    }
}
