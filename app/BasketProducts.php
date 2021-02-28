<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use function PHPUnit\Framework\isEmpty;

class BasketProducts extends Model
{
    protected $table = 'basket_products';

    /**
     * @var string
     */

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $fillable = [
        'basket_id',
        'product_id',
        'product_count',
        'total_price'
    ];

    public function getProductCount()
    {
        return $this->product_count;
    }

    public function setProductCount()
    {
        $this->product_count++;
    }

    public function Products(): object
    {
        return $this->hasOne(Product::class, 'id', 'product_id')->with('specialPrices');
    }

    public function setTotalPrice()
    {
        $productCount = $this->getProductCount();
        $productData = $this->Products()->first();

        $this->total_price = $this->calculateTotalPrice($productCount, $productData);
        $this->save();
    }

    private function calculateTotalPrice($productCount, $productData, $returnTotalPrice = 0)
    {
        $productDataFiltered = $productData->specialPrices->filter(function ($item) use ($productCount) {
            return $item->product_count <= $productCount;
        });

        if ($productDataFiltered->isEmpty()) {
            $returnTotalPrice += $productCount * $productData->price;

        } else {
            if ($productCount == $productDataFiltered->first()->product_count) {
                $returnTotalPrice += $productDataFiltered->first()->special_price;

            } else {
                $returnTotalPrice += $productDataFiltered->first()->special_price;
                $returnTotalPrice = $this->calculateTotalPrice($productCount - $productDataFiltered->first()->product_count, $productData, $returnTotalPrice);

            }

        }

        return $returnTotalPrice;
    }

}
