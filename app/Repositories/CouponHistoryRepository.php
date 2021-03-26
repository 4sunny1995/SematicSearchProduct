<?php
namespace App\Repositories;

use App\Model\Coupon;
use App\Model\CouponDetail;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class CouponHistoryRepository
{
    public function getAll()
    {
        try
        {
            $items = CouponDetail::with('user','coupon')->get();
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
            $data['coupon_id'] = Coupon::where('code',$data['code'])->first()->id;
            $check = CouponDetail::create($data);
            $data = CouponDetail::with('user','coupon')->where('id',$check->id)->first();
            if($check){
                return [
                    "message"=>"success",
                    "success"=>true,
                    "data"=>$data
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
            $item = CouponDetail::findOrfail($id);
            $item->update($data);
            return [
                "message"=>"success",
                "success"=>true,
                "data"=>CouponDetail::with('user','coupon')->findOrfail($id)
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
            $data = CouponDetail::with('user','coupon')->findOrfail($id);
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
            $data = CouponDetail::findOrfail($id);
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