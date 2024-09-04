<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('status','Pending')->get();
        $orderList = $orders->unique('voucher_no');

        return view('admin.orders.index',compact('orderList'));
    }

    public function orderAccept() 
    {
        $orders = Order::where('status','Accept')->get();
        $orderList = $orders->unique('voucher_no');
        // dd($orderList);

        return view('admin.orders.index',compact('orderList'));
    }

    public function orderComplete() 
    {
        $orders = Order::where('status','Complete')->get();
        $orderList = $orders->unique('voucher_no');
        // dd($orderList);

        return view('admin.orders.index',compact('orderList'));
    }

    public function orderDetail($voucher_no)
    {
        // echo $voucher_no;
        $orders = Order::where('voucher_no',$voucher_no)->get();
        // dd($orders);
        return view('admin.orders.detail',compact('orders'));
    }
}
