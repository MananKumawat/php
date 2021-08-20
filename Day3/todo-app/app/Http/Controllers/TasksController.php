<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use App\Services\TaskService;

class TasksController extends Controller
{
    private $service;

    function __construct(){
        $this->service = new TaskService();
    }

    function isAssoc(array $arr)
    {
        if (array() === $arr) return false;

        return array_keys($arr) !== range(0, count($arr) - 1);
    }

    function create(Request $request)
    {
        $row = $this->service->create($request);

        if ($this->isAssoc($row))
            return response($row);

        else
            return response()->json([ "error" => $row], 400);

    }

    function delete($id)
    {
        $success = $this->service->delete($id);

        if ($success) {
            return response()->json([ "Deleted the task ". $id . " successfully" ]);
        }

        else {
            return response()->json([ "error" => "Failed to delete the task ". $id . ". Enter valid task id"], 400);
        }
    }

    function get($id='')
    {
        $rows = $this->service->get($id);

        if ($rows == array() && $id != '')
            return response()->json([ "error" => "Failed to get the task ". $id . ". Enter valid task id"], 400);
        else
            return response()->json($rows);
    }

    function update($id, Request $request)
    {
        $success = $this->service->update($id, $request);

        if ($success == 1) {
            return response()->json([ "Updated the task ". $id . " successfully" ]);
        }

        else if ($success == 0) {
            return response()->json([ "error" => "Failed to update the task ". $id . ". Enter valid task id"], 400);
        }

        else {
            return response()->json([ "error" => "Failed to update the task ". $id . ". Enter state " . $success], 400);
        }
    }
}
