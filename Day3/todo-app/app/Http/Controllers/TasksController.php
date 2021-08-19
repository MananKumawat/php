<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Services\TaskService;

class TasksController extends Controller
{
    function create(Request $request)
    {
        $service = new TaskService();
        $row = $service->create($request);
        return response()->json($row);
    }

    function delete($id)
    {
        $service = new TaskService();
        $service->delete($id);
        return response("Deleted the task ". $id . " successfully");
    }

    function get()
    {
        $service = new TaskService();
        $rows = $service->get();
        return response()->json($rows);
    }

    function update($id, Request $request)
    {
        $service = new TaskService();
        $service->update($id, $request);
        return response("Updated the task ". $id . " successfully");
    }
}
