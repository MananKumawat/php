<?php

namespace App\Services;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskService
{
    function create(Request $request)
    {
        $description = $request['description'];
        $task = new Task();
        return $task->create($description);
    }

    function delete($id)
    {
        $task = new Task();
        $task->deleteById($id);
    }

    function get(){
        $task = new Task();
        return $task->getAll();
    }

    function update($id, Request $request)
    {
        $state = $request['state'];
        $task = new Task();
        $task->updateStateById($id, $state);
    }
}
