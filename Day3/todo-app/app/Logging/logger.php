<?php

namespace App\Logging;

use Illuminate\Support\Facades\Log;

class Logger
{
    function create($description)
    {
        Log::channel('fire')->info('User fired create API',[
            'with description ' => $description,
        ]);
    }

    function get()
    {
        Log::channel('fire')->info('User fired get API');
    }

    function delete($id)
    {
        Log::channel('fire')->info('User fired delete API',[
            'with task id ' => $id,
        ]);
    }

    function update($id)
    {
        Log::channel('fire')->info('User fired update API',[
            'with task id ' => $id,
        ]);
    }
}
