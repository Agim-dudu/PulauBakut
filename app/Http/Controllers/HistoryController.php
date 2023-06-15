<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class HistoryController extends Controller
{
    public function index()
    {
        $orders = Order::all();

        return view('history', compact('orders'));
    }
}
