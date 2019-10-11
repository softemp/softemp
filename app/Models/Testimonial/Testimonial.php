<?php

namespace App\Models\Testimonial;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $connection = 'mysql_testimonial';
    protected $table = 'testimonials';

    protected $fillable = [
        'client_id','descriptions', 'owner_company_id'
    ];
}
