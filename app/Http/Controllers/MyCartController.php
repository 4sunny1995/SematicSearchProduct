<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Cart;
use Exception;
use Illuminate\Support\Facades\Log;

class MyCartController extends Controller
{
    private $userId;
    public function __construct()
    {
        $this->userId = Auth::id();
    }
    public function index()
    {
        return view('shop.mycart');
    }

    public function getMyCart()
    {
        $id = Auth::id();
        $data = \Cart::session($id)->getContent();
        $total = 0.00;
        foreach ($data as $key=>$value)
        {
            $value['price'] = $value['associatedModel']['price']*$value['quantity'];
            $price = $value['price'];
            $total+=$price;
        }
        $total = number_format($total,0);
        $count = count($data);
        return [
            "message"=>"success",
            "success"=>true,
            "data"=>$data,
            "total"=>$total,
            "count"=>$count
        ];
    }
    public function changeAmountOfItem(Request $request)
    {
        $body = $request->all();
        // dd($body);  
        try
        { 
            $id = Auth::id();
            $item = \Cart::session($id)->get($body['product_id']);
            $item['quantity'] = $item['quantity']+$body['quantity'];
            return $this->getMyCart();
        }
        catch(Exception $e)
        {
            Log::info($e->getMessage());
        }
    }
}
