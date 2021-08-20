<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreateTask()
    {
        $response = $this->post('/tasks', ['description' => 'Do maths homework']);

        $response->assertStatus(200);
    }
}
