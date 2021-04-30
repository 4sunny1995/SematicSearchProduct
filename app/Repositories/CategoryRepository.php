<?php
namespace App\Repositories;

use App\Model\Category;
use App\Wishlist;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CategoryRepository
{
    public function getAll()
    {
        try
        {
            // dd(1);
            $data = Category::all()->toArray();
            $carts = \Cart::getContent()->toArray();
            
            return [
                "message"=>"success",
                "success"=>true,
                "data"=>$data
            ];
        }
        catch(Exception $e)
        {
            Log::info($e->getMessage());
            return null;
        }
    }
    public function store(array $data)
    {
        try
        {
            $data;
            return [
                "message"=>"success",
                "success"=>true,
                "data"=>Category::findOrFail($data)
            ];
        }
        catch(Exception $e)
        {
            Log::info($e->getMessage());
            return null;
        }
    }
    public function update(array $data,$id)
    {
        try
        {
            $item = Category::findOrfail($id);
            $item->update($data);
            return [
                "message"=>"success",
                "success"=>true,
                "data"=>Category::findOrFail($id)
            ];
        }
        catch(Exception $e)
        {
            Log::info($e->getMessage());
            return null;
        }
    }
    public function destroy($id)
    {
        try
        {
            $data = Category::findOrfail($id)->delete();
            return [
                "message"=>"success",
                "success"=>true,
                "data"=>$data
            ];
        }
        catch(Exception $e)
        {
            Log::info($e->getMessage());
            return null;
        }
    }
    public function show($id)
    {
        try
        {
            // dd($id);
            $data = Category::where('category_parent_id',$id)->get()->toArray();
            for($index=0;$index<count($data);$index++){
                $data[$index]['isWishList']=false;
                $isWishList = Wishlist::where('user_id',$id)->where('product_id',$data[$index]['id'])->first();
                if($isWishList){
                    $data[$index]['isWishList'] = true;
                }
            }
            // dd($data);
            return [
                "message"=>"success",
                "success"=>true,
                "data"=>$data
            ];
        }
        catch(Exception $e)
        {
            Log::info($e->getMessage());
            return null;
        }
    }
}