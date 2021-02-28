<?php

namespace App\Http\Controllers;

use App\Basket;
use App\BasketProducts;
use App\Exceptions\ProductNotFoundException;
use App\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function addProduct($basketGUID, $productID): object
    {

        try {
            DB::beginTransaction();
            $product = Product::where('id', $productID)->first();

            if (!$product) {
                throw new ProductNotFoundException();
            }

            $basketData = Basket::firstOrNew([
                'basket_guid' => $basketGUID,
            ]);

            $basketData->save();

            $basketProductsData = BasketProducts::firstOrNew([
                'basket_id' => $basketData->id,
                'product_id' => $productID
            ]);

            $basketProductsData->setProductCount();
            $basketProductsData->setTotalPrice();

            $basketData->setTotalPrice();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                "status" => 'invalid_data',
                "message" => $e->getMessage()
            ]);
        }

        return response()->json([
            "status" => 'ok',
            "message" => "Product Add Completed"
        ]);

    }
}
