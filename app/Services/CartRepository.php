<?php
namespace App\Services;

use App\Model\Product;
use Darryldecode\Cart\Cart;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CartRepository
{
    public function store(array $request)
    {
        try
        {
            // dd($request);
            $productid = $request['pid'];
            $quantity = $request['quantity'];
            $userID = Auth::id();
            // $rowId = random_int(1,10000);
            $product = Product::findOrfail($productid);
            \Cart::session($userID)->add(array(
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $quantity,
                'associatedModel' => $product
            ));
            //End
            // dd(\Cart::getContent()->toArray());
            return [
                "message"=>"success",
                "success"=>true,
                "data"=>$product
            ];
        }
        catch(Exception $e)
        {
            Log::info($e->getMessage());
        }
    }
    public function destroy($id)
    {
        try
        {
            $check = \Cart::session(Auth::id())->remove($id);
            return [
                "message"=>"success",
                "success"=>true,
                "data"=>$id
            ];
        }
        catch(Exception $e)
        {
            Log::info($e->getMessage());
        }
    }
}