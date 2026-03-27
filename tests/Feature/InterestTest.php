<?php

namespace Tests\Feature;

use App\Models\Student;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InterestTest extends TestCase
{
    use RefreshDatabase ;
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $student = Student::factory()->create();
        $response = $this->actingAs($student->user)->getJson('api/v1/interests');

        $response->assertStatus(200);
    }
}
