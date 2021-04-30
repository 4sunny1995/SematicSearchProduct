<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
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
}
