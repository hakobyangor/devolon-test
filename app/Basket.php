<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    protected $table = 'basket';

    /**
     * @var string
     */

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'basket_guid',
        'total_price',
        'total_price'
    ];

    public function getId(): int
    {
        return $this->id;
    }

    public function clearBasket()
    {
        BasketProducts::where('basket_id', $this->getId())->delete();
    }

    public function getTotalPrice(): float
    {
        $basketProducts = BasketProducts::where('basket_id', $this->getId())->with('products')->get();

        if (empty($basketProducts)) {
            $totalPrice = 0;
        } else {
            $totalPrice = $basketProducts->sum('total_price');

        }
        return $totalPrice;
    }


    public function setTotalPrice()
    {
        $this->total_price = $this->getTotalPrice();
        $this->save();
    }

}
