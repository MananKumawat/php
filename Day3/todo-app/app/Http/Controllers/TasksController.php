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
}
