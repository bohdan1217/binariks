<?php

namespace Tests\Unit\Product\Scope;

use App\Product;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ScopeQTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testSimple()
    {
        $product = factory(Product::class)->create([
            'title' => 'test1',
        ]);
        $dbProduct = Product::q('products')->first();
        $this->assertTrue($dbProduct->id == $product->id);
    }

    public function testNotFound() {
        factory(Product::class)->create([
            'title' => 'my-another-product',
        ]);

        $dbProduct = Product::q('products')->first();
        $this->assertNull($dbProduct);
    }

    public function testSlug(){
        $product = factory(Product::class)->create([
            'title' => '',
            'slug' => 'slug-for-first-post',
        ]);
        $dbProduct = Product::q('first')->first();
        $this->assertNotNull($dbProduct);
        $this->assertTrue($dbProduct->id == $product->id);
    }


}
