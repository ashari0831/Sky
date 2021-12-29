<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Product;

class AdminTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_not_found_all_chats()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create(['usertype' => 'admin']);
        $this->actingAs($user);

        $response = $this->get('/admin');

        $response->assertStatus(200);
    }

    public function test_not_found_product()
    {
        $pro = Product::factory()->create();
        $user = User::factory()->create(['usertype' => 'admin']);
        $this->actingAs($user);
        
        $response = $this->get('/admin/products/'. $pro->id .'/edit');

        // $response->assertStatus(200);
        // $response->assertViewHas('product');
        // $response->assertViewMissing('productd');
    }
}
