<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TasksController extends Controller
{
    function create(Request $request)
    {
        $description = $request['description'];
        $task = new Task();
        $row = $task->create($description);
        return response()->json($row);
    }

    function delete($id)
    {
        $task = new Task();
        $task->deleteById($id);
        return response("Deleted task with ". $id . " successfully");
    }

    function get()
    {
        $task = new Task();
        $rows = $task->getAll();
        return response()->json($rows);
    }
}
