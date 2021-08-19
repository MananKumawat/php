<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Task extends Model
{
    function create($description)
    {
        $values = array('id' => 0, 'description' => $description, 'state' => 'PENDING');
        $values['id'] = DB::table('tasks')->insertGetId($values);
        return $values;
    }

    function deleteById($id)
    {
        DB::table('tasks')->where('id', '=', $id)->delete();
    }

}