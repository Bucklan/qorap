<?php

namespace Tests\Feature;

use App\Models\Cart;
use App\Models\Gift;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GiftsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_homepage_contains_empty_table()
    {
        $response = $this->get('/cart');

        $response->assertStatus(200);
        $response->assertSee(__('cart.our shopping cart is empty!'));
    }
}
