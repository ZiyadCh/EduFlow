<?php

namespace Tests\Feature;

use App\Models\Student;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FavoriteTest extends TestCase
{
    use RefreshDatabase ;
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $user = User::factory()->create();
        $student = Student::factory()->create([
            'user_id' => $user->id,
        ]);

        $response = $this->actingAs($student)->getJson('/api/v1/favorites');

        $response->assertStatus(200);
    }
}
