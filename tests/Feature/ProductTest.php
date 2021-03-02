<?php

namespace Tests\Feature;

use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testProductTest()
    {

        $this->get('/api/add-product/537dae80-3b0c-4744-9b64-7f657f316d1d/1');
        $this->get('/api/add-product/537dae80-3b0c-4744-9b64-7f657f316d1d/1');
        $this->get('/api/add-product/537dae80-3b0c-4744-9b64-7f657f316d1d/1');
        $this->get('/api/add-product/537dae80-3b0c-4744-9b64-7f657f316d1d/2');

        $response = $this->get('/api/checkout/complete-checkout/537dae80-3b0c-4744-9b64-7f657f316d1d')->json();

        $this->assertEquals("Checkout Completed total price is 8.8$", $response["message"]);

    }

}
