<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TaskService;

class TasksController extends Controller
{
    function create(Request $request)
    {
        $service = new TaskService();
        $row = $service->create($request);
        if (!is_array($row))
            return response($row, 400);
        return response()->json($row);
    }

    function delete($id)
    {
        $service = new TaskService();
        $success = $service->delete($id);
        if ($success) {
            return response("Deleted the task ". $id . " successfully");
        } else {
            return response("Failed to delete the task ". $id);
        }
    }

    function get()
    {
        $service = new TaskService();
        $rows = $service->get();
        return response()->json($rows);
    }

    function update($id)
    {
        $service = new TaskService();
        $success = $service->update($id);
        if ($success) {
            return response("Updated the task ". $id . " successfully");
        } else {
            return response("Failed to update the task ". $id);
        }
    }
}
