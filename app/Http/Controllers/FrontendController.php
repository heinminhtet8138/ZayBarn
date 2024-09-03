<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Payment;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;


class FrontendController extends Controller
{
    public function index() {
        $products = Product::orderBy('id','DESC')->get();
        // dd($products);
        return view('frontend.index', compact('products'));
    }

    public function shopItem($id) {
        $product = Product::find($id);
        // dd($product->category_id);
        $products = Product::where('category_id',$product->category_id)->where('id','!=',$id)->orderBy('id','DESC')->get();
        // dd($products);
        return view('frontend.shop_item', compact('product','products'));
    }

    public function checkOut() {
        $payments = Payment::all();
        // dd($payments);
        return view('frontend.checkout',compact('payments'));
    }

    public function orderNow(Request $request){
        // dd($request);
        $dataArray = json_decode($request->orderItems);

        $voucherNo = strtotime(date('h:i:s'));
        // echo $voucherNo;
        $file_name = time().'.'.$request->payment_slip->extension(); // 2121212112.png
        $upload = $request->payment_slip->move(public_path('images/paymentSlip/'),$file_name);

        foreach($dataArray as $data) {
            $order = new Order();
            $order->voucher_no = $voucherNo;
            $order->product_id = $data->id;
            $order->qty = $data->qty;
            $order->payment_id = $request->payment_id;
            $order->payment_slip = "/images/paymentSlip/".$file_name;
            $order->user_id = 1;
            $order->status = "Pending";
            $order->save();
        }

        return 'Your order Successful';

    }

    public function productCategory($id)
    {
        $products = Product::where('category_id',$id)->orderBy('id','DESC')->get();
        // dd($products);
        return view('frontend.index', compact('products'));

    }
}
