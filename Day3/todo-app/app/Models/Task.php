<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Mockery\Exception;

class Task extends Model
{
    function create($description)
    {
        $values = array('id' => 0, 'description' => $description, 'state' => 'Pending');
        $values['id'] = DB::table('tasks')->insertGetId($values);
        return $values;
    }

    function deleteById($id)
    {
        return DB::table('tasks')->where('id', '=', $id)->delete();
    }

    function getAll()
    {
        return DB::table('tasks')->select('id', 'description', 'state')->get();
    }

    function getById($id)
    {
        return DB::table('tasks')->where('id', $id)->first();
    }

    function getStatusById($id)
    {
        return DB::table('tasks')->where('id', $id)->value('state');
    }

    function updateStateById($id, $state)
    {
        return DB::table('tasks')->where('id', $id)->update(['state' => $state]);
    }
}
