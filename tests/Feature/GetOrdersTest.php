<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GetOrdersTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testOk()
    {
        $response = $this->get('/orders');
        $response->assertStatus(200);
    }




}
