<?php

namespace Tests\Feature;

use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GroupTest extends TestCase
{
    use RefreshDatabase ;
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {

        $student = Student::factory()->create();
        $response = $this->actingAs($student->user)->getJson('api/v1/groups');

        $response->assertStatus(200);
    }
}
