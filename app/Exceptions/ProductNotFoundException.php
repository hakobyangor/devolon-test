<?php

namespace App\Exceptions;

use Exception;

class ProductNotFoundException extends Exception
{

    public function render()
    {
        return response()->json([
            "status" => 'invalid_data',
            "message" => "Product Not Found"
        ]);
    }
}
