<?php

namespace App\Http\Controllers;


use App\Basket;
use App\Exceptions\BasketNotFoundException;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function completeCheckOut($basketGUID): object
    {
        try {
            DB::beginTransaction();
            $basket = Basket::where('basket_guid', $basketGUID)->first();

            if (!$basket) {
                throw new BasketNotFoundException();
            }

            $basketTotalPrice = $basket->getTotalPrice();
            $basket->clearBasket();
            DB::commit();
        } catch (\Exception $e) {
            return response()->json([
                "status" => 'invalid_data',
                "message" => $e->getMessage()
            ]);
        }

        return response()->json([
            "status" => 'ok',
            "message" => "Checkout Completed total price is {$basketTotalPrice}$"
        ]);
    }
}
