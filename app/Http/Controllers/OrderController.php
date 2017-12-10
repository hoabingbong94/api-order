<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index() {
        dd('a');
    }

    public function order(Request $request, $id = null) {
        dd('b');
        dd($id);
    }
}
