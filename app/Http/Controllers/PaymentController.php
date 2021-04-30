<?php

namespace App\Http\Controllers;

use App\Model\Order;
use App\Model\OrderDetail;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function Payment(Request $request,$type)
    {
        try
        {
            $credential = $request->all();
            // Log::info($credential);
            // dd($credential);
            $order = [
                "code"=>Str::random(25),
                "user_id"=>Auth::id(),
                "total"=>$credential['total'],
                "status"=>0
            ];
            // dd($order);
            $check = Order::create($order);
            if($check){
                // dd($check);
                switch ($type) {
                    case 'cash':
                        $action = $this->cash($credential,$check->id);
                        break;
                    case 'momo':
                        $action = $this->momo($credential,$check->id);
                        break;
                    default:
                    $action = $this->delivery($credential,$check->id);
                        break;
                }
                return $action;
            }
        }
        catch(Exception $e)
        {
            Log::info($e->getMessage());
        }
    }
    private function delivery(array $credential,$orderid)
    {
        try
        {
            $order = Order::findOrfail($orderid);
            if($order){
                $order->status = 1;
                $order->save();
            }
            // dd($credential['items']);
            $items = $credential['items'];
            foreach($items as $key=>$item)
            {
                $order_detail = [
                    "order_id"=>$orderid,
                    "product_id"=>$item['id'],
                    "quantity"=>$item['quantity'],
                    "price"=>$item['price'],
                    "name"=>$item['name']
                ];
                $ok = OrderDetail::create($order_detail);
            }
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
