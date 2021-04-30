<?php
namespace App\Services;

use App\Wishlist;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class WishListRepository
{
    public function getAll()
    {
        try
        {

        }
        catch(Exception $e)
        {
            Log::info($e->getMessage());
        }
    }
    public function store(array $body)
    {
        try
        {
            // dd($body);
            $body = [
                "user_id"=>Auth::id(),
                "product_id"=>$body['id']
            ];
            $wishlist = Wishlist::create($body);
            return [
                "message"=>"success",
                "success"=>true,
                "data"=>$wishlist
            ];
        }
        catch(Exception $e)
        {
            Log::info($e->getMessage());
        }
    }
    public function update(array $body,$id)
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
            $data = Wishlist::where('user_id',Auth::id())->where('product_id',$id)->first()->delete();
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