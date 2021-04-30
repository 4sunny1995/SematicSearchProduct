<?php

namespace App\Http\Controllers;

use App\Wishlist;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class MyWishListController extends Controller
{
    public function index()
    {
        return view('shop.mywishlist');
    }
    public function getMyWishList()
    {
        try
        {
            $id = Auth::id();
            $mywishlist = Wishlist::with('product')->where('user_id',$id)->get();
            $carts = \Cart::session(Auth::id())->getContent()->toArray();
                // dd($carts,$data);
                for($index = 0;$index<count($mywishlist);$index++)
                {
                    $mywishlist[$index]['isCart'] = false;
                    foreach($carts as $key=>$cart)
                    {
                        if($mywishlist[$index]['id']==$key){
                            $data[$index]['isCart']=true;
                            break;
                        }
                    }
                }
            return [
                "message"=>"success",
                "success"=>true,
                "data"=>$mywishlist
            ];
        }
        catch(Exception $e)
        {
            Log::info($e->getMessage());
        }
    }
}
