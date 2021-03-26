<?php
namespace App\Repositories;

use App\Model\Coupon;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class CouponRepository
{
    public function getAll()
    {
        try
        {
            $items = Coupon::all();
            return [
                "message"=>"success",
                "success"=>true,
                "data"=>$items
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
            $data['code'] = Str::random(25);
            $check = Coupon::create($data);
            if($check){
                return [
                    "message"=>"success",
                    "success"=>true,
                    "data"=>$check
                ];
            }
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
            $item = Coupon::findOrfail($id);
            $item->update($data);
            return [
                "message"=>"success",
                "success"=>true,
                "data"=>Coupon::findOrfail($id)
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
            $data = Coupon::findOrfail($id);
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
    public function destroy($id)
    {
        try
        {
            $data = Coupon::findOrfail($id);
            $data->delete();
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