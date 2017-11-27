<?php

namespace App\Http\Controllers;

use App\User;

class UsersController extends Controller
{

    public function index()
    {
        $users  = User::all();
        if ($users) {
            $data = [
                'code' => 200,
                'message' => 'get list data user',
                'data' => $users
            ];
        }

        return response()->json($data, 200);
    }

    //
}
