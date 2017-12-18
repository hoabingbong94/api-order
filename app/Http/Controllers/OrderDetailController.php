<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{

    public function orderdetail()
    {
        $orderDetail = new OrderDetail();
        $dishs = $orderDetail->with('order', 'dish')->get();
        if (count($dishs) > 0) {
            $data = [
                'code' => 0,
                'message' => 'get list data table success',
                'data' => $dishs
            ];
        } else {
            $data = [
                'code' => 1,
                'message' => 'get list data table faild',
                'data' => []
            ];
        }
        return response()->json($data, 200);
    }

    /**
     * Post: order_id, dish_id, quality
     */
    public function update(Request $request)
    {
        $order_id = (int)$request->order_id;
        $dish_id = (int)$request->dish_id;
        $quality = (int)$request->quality;
        if(isset($order_id) && isset($dish_id) && isset($quality)) {
            $orderDetail = new OrderDetail();
            $orderDetail->id_order = $order_id;
            $orderDetail->id_dish = $dish_id;
            $orderDetail->quality = $quality;
            $orderDetail->save();
            if (count($orderDetail) > 0) {
                $data = [
                    'code' => 0,
                    'message' => 'get list data order detail success',
                    'data' => $orderDetail
                ];
            } else {
                $data = [
                    'code' => 1,
                    'message' => 'get list data order detail faild',
                    'data' => []
                ];
            }
            return response()->json($data, 200);
        }

    }
}
