<?php

namespace App\Models\Core\Contact;

use App\Models\Users\Person;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContEmail extends Model
{
    use SoftDeletes;

    protected $table = 'cont_emails';

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
        'email', 'is_login', 'cont_type_id', 'person_id'
    ];

    public function rulesStore() {
        return [
            'email' => 'required|email',
            'cont_type_id' => 'required',
            'person_id'=> 'required',
        ];
    }

    public function rulesUpdate($id = null) {
        return [
            'email' => 'required|email|unique:cont_emails,email,'.$id,
            'cont_type_id' => 'required',
            'person_id'=> 'required',
        ];
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contTypes(){
        return $this->belongsTo(ContType::class,'cont_type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function persons(){
        return $this->belongsTo(Person::class,'person_id','id');
    }

    /**
     * retorna o email cadastrado para login
     *
     * @param $email
     * @return mixed
     */
    public function getEmailLogin($email){
        return $this->where([
            ['email','=',$email],
            ['is_login','=','1']
        ])->get();
    }
}
