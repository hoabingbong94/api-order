<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     * @get list api user
     */
    public function index()
    {
        $users = User::all();
        if ($users) {
            $data = [
                'code' => 200,
                'message' => 'get list data user',
                'data' => $users
            ];
        }
        return response()->json($data, 200);
    }

    public function create(Request $request){

        $user = User::create($request->all());
        if ($user) {
            $data = [
                'code' => 200,
                'message' => 'create data user',
                'data' => $user
            ];
        }
        return response()->json($data, 200);
    }

}
