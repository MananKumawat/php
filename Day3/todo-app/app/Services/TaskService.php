<?php

namespace App\Services;

use App\Logging\Logger;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskService
{
    function create(Request $request)
    {
        $description = $request['description'];

        $logger = new Logger();
        $logger->create($description);

        $validator = Validator::make($request->all(), [
            'description' => 'required|min:2|max:255'
        ]);

        if ($validator->fails()) {
            return $validator->errors()->all();
        }

        $task = new Task();
        return $task->create($description);
    }

    function delete($id)
    {
        $logger = new Logger();
        $logger->delete($id);

        $task = new Task();
        return $task->deleteById($id);
    }

    function get()
    {
        $logger = new Logger();
        $logger->get();

        $task = new Task();
        return $task->getAll();
    }

    function update($id)
    {
        $logger = new Logger();
        $logger->update($id);

        $state = 'Done';
        $task = new Task();
        $prevState = $task->getStatusById($id);
        if ($prevState == 'Pending') $state = 'In Progress';
        return $task->updateStateById($id, $state);
    }
}
