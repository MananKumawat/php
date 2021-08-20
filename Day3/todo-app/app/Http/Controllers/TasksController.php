<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TaskService;

class TasksController extends Controller
{
    function isAssoc(array $arr)
    {
        if (array() === $arr) return false;
        return array_keys($arr) !== range(0, count($arr) - 1);
    }

    function create(Request $request)
    {
        $service = new TaskService();
        $row = $service->create($request);
        if ($this->isAssoc($row))
            return response($row);
        else
            return response()->json([ "error" => $row], 400);

    }

    function delete($id)
    {
        $service = new TaskService();
        $success = $service->delete($id);
        if ($success) {
            return response("Deleted the task ". $id . " successfully");
        } else {
            return response()->json([ "error" => "Failed to delete the task ". $id . ". Enter valid task id"], 400);
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
            return response()->json([ "error" => "Failed to update the task ". $id . ". Enter valid task id"], 400);
        }
    }
}
