<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductSpecialPrice extends Model
{
    protected $table = 'products_special_prices';

    /**
     * @var array
     */

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}
