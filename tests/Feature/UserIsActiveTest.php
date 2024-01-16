<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserIsActiveTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $user = User::factory()->create(['is_active' => false]);

        $response = $this->actingAs($user)
            ->get('/api/user');

        $response->assertStatus(403);
    }
}
