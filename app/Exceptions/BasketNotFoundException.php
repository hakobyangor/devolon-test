<?php

namespace App\Exceptions;

use Exception;

class BasketNotFoundException extends Exception
{

    public function render()
    {
        return response()->json([
            "status" => 'invalid_data',
            "message" => "Basket Not Found"
        ]);
    }
}
