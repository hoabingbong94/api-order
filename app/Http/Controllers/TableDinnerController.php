<?php

namespace App\Http\Controllers;

use App\TableDinner;
use Illuminate\Http\Request;

class TableDinnerController extends Controller
{

    public function index()
    {
        $tables = TableDinner::where(['status' => true])->get();
        $countSlider = count($tables);
        if (count($tables) > 0) {
            $data = [
                'code' => 0,
                'message' => 'get list data table success',
                'total' => $countSlider,
                'data' => $tables
            ];
        } else {
            $data = [
                'code' => 1,
                'message' => 'get list data table faild',
                'total' => $countSlider,
                'data' => []
            ];
        }
        return response()->json($data, 200);
    }

    public function update(Request $request) {
        $id = (int)$request->id;
        $table = TableDinner::find($id);
        $countSlider = count($table);
        if (!isset($request->status)) {
            $data = [
                'code' => 0,
                'message' => 'get a data table faild',
                'total' => $countSlider,
                'data' => $table
            ];
            return response()->json($data, 400);
        }
        $table->status = (int) $request->status;
        $table->save();
        if (count($table) > 0) {
            $data = [
                'code' => 0,
                'message' => 'get a data table success',
                'total' => $countSlider,
                'data' => $table
            ];
        } else {
            $data = [
                'code' => 1,
                'message' => 'get a data table faild',
                'total' => $countSlider,
                'data' => []
            ];
        }
        return response()->json($data, 200);
    }


}
