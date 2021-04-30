<?php

namespace App\Http\Controllers;

use App\Model\Order;
use App\Model\OrderDetail;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class MyOrderController extends Controller
{
    public function getMyOrder()
    {
        try
        {
            $id = Auth::id();
            $orders = Order::where('user_id',$id)->get();
            return [
                "message"=>"success",
                "success"=>true,
                "data"=>$orders
            ];
        }
        catch(Exception $e)
        {
            Log::info($e->getMessage());
        }
    }
    public function getMyOrderDetail($id)
    {
        try
        {
            $items = OrderDetail::with('user','product')->where('order_id',$id)->get();
            // dd($items);
            return [
                "message"=>"success",
                "success"=>true,
                "data"=>$items
            ];
        }
        catch(Exception $e)
        {
            Log::info($e->getMessage());
        }

    }
}
