<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Mockery\Exception;

class OrderController extends Controller
{

    public function index(Request $request)
    {
        $data = $request->input();
        if ($data == null) {
            return response()->json( $data, 0);
        }
        if (isset($data['data'])) {
            $data_list = json_decode($data['data']);
        }
        foreach ($data_list->orders as $item) {
            $order = Order::create([
                'id_user' => $data_list->id_user,
                'status' => $data_list->status,
                'id_dish' => $item->id
            ]);
        }


        $countOrder = count($order);
        if (count($order) > 0) {
            $data = [
                'code' => 0,
                'message' => 'get list data order success',
                'total' => $countOrder,
                'data' => $order
            ];
        } else {
            $data = [
                'code' => 1,
                'message' => 'get list data order faild',
                'total' => $countOrder,
                'data' => []
            ];
        }
        return response()->json($data, 200);
    }


}
