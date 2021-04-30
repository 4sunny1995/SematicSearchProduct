<?php
namespace App\Services;

use App\Model\Product;
use App\Wishlist;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ProductRepository
{
    public function getByCategoryId($id)
    {
        try
        {
            
        }
        catch(Exception $e)
        {
            Log::info($e->getMessage());
        }
    }
    public function show($id)
    {
        try
        {
            $product = Product::findOrfail($id);
            $cart = \Cart::session(Auth::id())->getContent()->toArray();
            if($product){
                $product['isCart'] = false;
                $product['isWishList'] = false;
                if(array_key_exists($product['id'],$cart)){
                    $product['isCart'] =true;
                }
                $wishlist = Wishlist::where('user_id',Auth::id())->where('product_id',$product['id'])->first();
                if($wishlist)$product['isWishList'] = true;
                return [
                    "message"=>"success",
                    "success"=>true,
                    "data"=>$product
                ];
            }
        }
        catch(Exception $e)
        {
            Log::info($e->getMessage());
        }
    }
}