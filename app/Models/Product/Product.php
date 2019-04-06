<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * @var string
     */
    protected $connection = 'mysql_product';

    /**
     * @var string
     */
    protected $table = 'phroducts';
}
