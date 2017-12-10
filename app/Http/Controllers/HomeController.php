<?php

namespace App\Http\Controllers;
use App\Dish;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index() {
        $dish = Dish::all();
        $countDish = count($dish);

        if (count($dish) > 0) {
            $array = [];
            foreach ($dish as $key => $val) {
                if ($val->type <= 3)
                {
                    $array[] = $val;
                }
                $data = [
                    'code' => 0,
                    'message' => 'get list data dish success',
                    'total' => $countDish,
                    'data' => $array
                ];
            }
        } else {
            $data = [
                'code' => 1,
                'message' => 'get list data dish faild',
                'total' => $countDish,
                'data' => []
            ];
        }
        return response()->json($data, 200);
    }

    public function detail (Request $request, $id = null) {
        $id = (int)$id;
        $dish = Dish::find($id);
        $countDish = count($dish);
        if (!$dish) {
            $data = [
                'code' => 0,
                'message' => 'get list data detail dish faild',
                'total' => $countDish,
                'data' => []
            ];
        } else {
            $data = [
                'code' => 1,
                'message' => 'get list data detail dish faild',
                'total' => $countDish,
                'data' => $dish
            ];
        }


        return response()->json($data, 200);
    }

    public function tab ($type = null) {
        $type = (int) $type;
        $dish = Dish::where('type', '=', $type)->get();
        $countDish = count($dish);
        if (!$dish) {
            $data = [
                'code' => 1,
                'message' => 'get list data detail dish faild',
                'total' => $countDish,
                'data' => []
            ];
        } else {
            $data = [
                'code' => 1,
                'message' => 'get list data detail dish faild',
                'total' => $countDish,
                'data' => $dish
            ];
        }


        return response()->json($data, 200);
    }
}
