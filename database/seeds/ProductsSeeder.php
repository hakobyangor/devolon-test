<?php

use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'id' => 1,
                'name' => "Beer",
                'price' => 3.5,
            ],
            [
                'id' => 2,
                'name' => "Coffee",
                'price' => 1.3,
            ],
            [
                'id' => 3,
                'name' => "Bread",
                'price' => 1.0,
            ],
            [
                'id' => 4,
                'name' => "Juice",
                'price' => 3.2,
            ]
        ];

        DB::table('products')->insert($products);

        $productSpecialPrices = [
            [
                'product_id' => 1,
                'product_count' => 2,
                'special_price' => 6,
            ],
            [
                'product_id' => 1,
                'product_count' => 3,
                'special_price' => 7.5,
            ],
            [
                'product_id' => 1,
                'product_count' => 5,
                'special_price' => 12,
            ],
            [
                'product_id' => 2,
                'product_count' => 3,
                'special_price' => 3.5,
            ],

        ];

        DB::table('products_special_prices')->insert($productSpecialPrices);
    }
}
