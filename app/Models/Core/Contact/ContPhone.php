<?php

namespace App\Models\Core\Contact;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContPhone extends Model
{
    use SoftDeletes;

    protected $table = 'cont_phones';

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
        'ddd','phone', 'cont_type_id', 'person_id'
    ];

    /**
     * @return array
     */
    public function rulesStore()
    {
        return [
            'ddd' => 'required|min:2|max:2',
            'phone' => 'required|min:8|max:9',
            'cont_type_id' => 'required',
            'person_id' => 'required'
        ];
    }

    /**
     * @param null $id
     * @return array
     */
    public function rulesUpdate($id = null)
    {
        return [
            'ddd' => 'required|min:2|max:2',
            'phone' => 'required|min:8|max:9|unique:cont_phones,phone,' . $id,
            'cont_type_id' => 'required',
            'person_id' => 'required'
        ];
    }
}
