<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Log;
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

        $id = $response->json()['id'];

        $response = $this->get('/tasks/'.$id);

        $response->assertStatus(200);

        $response->assertJson([
            'id' => $id,
            'description' => 'Do maths homework',
            'state' => 'Pending',
        ]);
    }

    public function testCreateTaskFail()
    {
        $response = $this->post('/tasks', ['description' => 'A']);

        $response->assertStatus(400);

        $response->assertJson([
            'error' =>
                array ('The description must be at least 2 characters.'),
        ]);
    }

    public function testDeleteTask()
    {
        $response = $this->post('/tasks', ['description' => 'Do maths homework']);

        $id = $response->json()['id'];

        $response = $this->delete('/tasks/' . $id);

        $response->assertStatus(200);

        $response->assertJson(['Deleted the task ' . $id . ' successfully']);

    }

    public function testDeleteTaskFail()
    {

        $response = $this->delete('/tasks/' . 1000);

        $response->assertStatus(400);

        $response->assertJson([ "error" => "Failed to delete the task 1000. Enter valid task id"]);

    }


}
