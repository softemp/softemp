<?php

namespace App\Models\Core\People;

use App\Models\Core\AccessControl\Occupation;
use App\Models\Core\AccessControl\Role;
use App\Models\Core\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder;

class Physical extends Model
{
    use SoftDeletes;

    protected $table ='physicals';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'document', 'person_id'
    ];

    public function rules(){
        return [
            'name'=>'required',
            'document'=>'required',
            'person_id'=>'nullable'
        ];
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user(){
        return $this->hasOne(User::class,'physical_id','id');
    }

    /**
     * @param $user
     * @return Model
     */
    public function addUser($user) {
        return $this->user()->create($user);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function occupations(){
        return $this->belongsToMany(Occupation::class,'occupation_physical','physical_id','occupation_id');
    }

    /**
     * @param Occupation $occupation
     * @return Model
     */
    public function addOccupation(Occupation $occupation){
        return $this->occupations()->save($occupation);
    }

    /**
     * @param $occupation
     * @return mixed
     */
    public function hasOccupation($occupation) {
        if (is_string($occupation)) {
            return $this->occupations->contains('name', $occupation);
        }

        return $occupation->intersect($this->occupations)->count();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function people(){
        return $this->belongsTo(People::class,'person_id','id');
    }

    /**
     * remove formatação do CPF
     *
     * @param $value
     */
    public function setDocumentAttribute($value)
    {
        //$this->attributes['document'] = Str::slug($value);
        $this->attributes['document'] = $this->clearField($value);
    }

    /**
     * formata o CPF
     *
     * @param $value
     * @return string
     */
    public function getDocumentAttribute($value)
    {
        return substr($value, 0,3).'.'.
            substr($value, 3,3).'.'.
            substr($value, 6,3).'-'.
            substr($value, 9,2);
    }

    /**
     * remove os parametros especiais
     *
     * @param $param
     * @return mixed|null
     */
    private function clearField(?string $param){
        if(empty($param)){
            return null;
        }

        return str_replace(['.','-','/','(',')',' '], '', $param);
    }

    public function getInstallers(){
        $query = $this->query();
        $this->getOccupationInstaller($query);
        return $query;
    }

    private function getOccupationInstaller($query)
    {
//        $value = $this->value;
        $value = '7313-05';

        $query->whereHas('occupations', function ($query2) use ($value) {
            $query2->where('cbo2002', $value);
        });
    }

}
