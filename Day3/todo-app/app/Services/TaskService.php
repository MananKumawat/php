<?php

namespace App\Services;

use App\Logging\Logger;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskService
{
    private $logger;
    private $task;

    function __construct()
    {
        $this->logger = new Logger();
        $this->task = new Task();
    }

    function create(Request $request)
    {
        $description = $request['description'];

        $this->logger->create($description);

        $validator = Validator::make($request->all(), [
            'description' => 'required|min:2|max:255'
        ]);

        if ($validator->fails()) {
            return $validator->errors()->all();
        }

        return $this->task->create($description);
    }

    function delete($id)
    {
        $this->logger->delete($id);

        return $this->task->deleteById($id);
    }

    function get($id)
    {
        $this->logger->get();

        if ($id=='')
            return $this->task->getAll();

        else
            return $this->task->getById($id);
    }

    function update($id, $request)
    {
        $this->logger->update($id);

        $state = $request['state'];

        $prevState = $this->task->getStatusById($id);

        if ($prevState == 'Pending' && $state != 'In Progress')
            return 'In Progress';

        if ($prevState == 'In Progress' && $state != 'Done')
            return 'Done';

        if ($prevState == 'Done' && $state != 'Done')
            return 'Done';

        return $this->task->updateStateById($id, $state);
    }
}
