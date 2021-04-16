<?php
namespace App\Repositories;

use App\Model\Category;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CategoryRepository
{
    public function getAll()
    {
        try
        {
            $data = Category::all()->toArray();
            $carts = \Cart::getContent()->toArray();
            // for($index = 0;$index<count($data);$index++)
            // {
            //     $data[$index] = false;
            //     for($jndex = 0;$jndex<count($carts);$jndex++)
            //     {
            //         if($carts[$jndex]['id']==$data[$index]['id']){
            //             $data[$index]['isCart'] = true;
            //         }
            //     }
            // }
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
            $data = Category::where('category_parent_id',$id)->get()->toArray();
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