<?php

namespace App\Models\Core\Company;

use App\Models\Core\Address\Address;
use App\Models\Core\People\People;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    //use SoftDeletes;

    protected $table = 'companies';

    //protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fantasy_name', 'business_name', 'document', 'document_2', 'document_3'
    ];

    protected $hidden = [
      'software_owner', 'person_id', 'created_at', 'updated_at'
    ];

    public function people(){
        return $this->belongsTo(People::class,'person_id','id');
    }

    public function getCompanySoftwareOwner(){
        $query = $this->query();
        $query->where('software_owner', 1);
        return $query;

//        return $this->where('software_owner', 1);
    }

    /**
     * @param $value
     * @return mixed
     */
    public function searchCompany($value){
        return $this->select('id','fantasy_name','business_name','document')
            ->where('fantasy_name', 'LIKE', '%' . $value . '%')
            ->orWhere('business_name', 'LIKE', '%' . $value . '%')
            ->orWhere('document', 'LIKE', '%' . $value . '%');
        //->with('people');
    }
}
