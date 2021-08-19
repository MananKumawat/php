<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Exception;

class User extends Controller
{
    function create(Request $request) {
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $values = array('first_name' => $first_name, 'last_name' => $last_name);
        DB::table('users')->insert($values);
        echo "User ". $first_name . " " . $last_name . " created successfully";
    }

    function delete($id) {
        DB::table('users')->where('id', '=', $id)->delete();
        echo "User ". $id . " deleted successfully";
    }

    function get($id=''){
        if($id==''){
            $users = DB::table('users')
                ->select('id', 'first_name', 'last_name')
                ->get();
        } else {
            $users = DB::table('users')->where('id', '=', $id)->get();
        }

        foreach ($users as $user) {
            print_r($user);
        }
    }
}
