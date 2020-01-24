<?php

namespace Tests\Unit;

use App\Product;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductStoreTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $product = factory(Product::class)->create();
        $dbProduct = Product::first();

        $this->assertNotNull($dbProduct);
        $this->assertTrue($dbProduct->id == $product->id);
    }
}
