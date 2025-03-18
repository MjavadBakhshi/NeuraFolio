<?php

namespace Tests\Feature\Portfolio;

use Domain\Account\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PortfolioTest extends TestCase
{

    use DatabaseTransactions; // Prevents database changes
    
    /**
     * A basic feature test example.
     */
    public function test_user_can_create_portfolio(): void
    {
        // Create a user
        $user = User::factory()->create();
    
        // Acting as the user (authentication)
        $this->actingAs($user);
        $this->withoutMiddleware();
        
        $response = $this->postJson(route('user.portfolio.store'), [
            'name' => 'My Test Portfolio',
        ]);

    
         // Assert that response is successful
         $response->assertStatus(201)
         ->assertJson([
             'success' => true,
         ]);

        // Ensure portfolio was not persisted in DB after test
        $this->assertDatabaseHas('portfolios', ['name' => 'My Test Portfolio']);
    }
}
