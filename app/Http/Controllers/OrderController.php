<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Mockery\Exception;

class OrderController extends Controller
{

    public function index(Request $request)
    {
        $order = new Order();
        $order->total = 0;
        $idOrder = 0;
        if ($order->save()) {
            $idOrder = $order->id;
        }

        if (count($order) > 0) {
            $data = [
                'code' => 0,
                'message' => 'get a data order success',
                'data' => $idOrder
            ];
        } else {
            $data = [
                'code' => 1,
                'message' => 'get a data order faild',
                'data' => []
            ];
        }
        return response()->json($data, 200);
    }

    public function update(Request $request){
        $data = $request->input();
        if (isset($data['id']) && isset($data['total'])) {
            $id = (int) $data['id'];
            $total = (float) $data['total'];
            $order = Order::find($id);
            $order->total = $total;
            $order->save();
            if (count($order) > 0) {
                $data = [
                    'code' => 0,
                    'message' => 'get a data order success',
                    'data' => $order
                ];
            } else {
                $data = [
                    'code' => 1,
                    'message' => 'get a data order faild',
                    'data' => []
                ];
            }
            return response()->json($data, 200);
        }
    }


}
