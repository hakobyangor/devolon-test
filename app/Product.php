<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    /**
     * @var array
     */

    protected $hidden = [
        'created_at',
        'updated_at'
    ];


    public function specialPrices(): object
    {
        return $this->hasMany(ProductSpecialPrice::class, 'product_id', 'id')->orderByDesc('product_count');
    }

}
