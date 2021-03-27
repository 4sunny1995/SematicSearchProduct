<?php
namespace App\Repositories;

use App\Model\Coupon;
use App\Model\Reward;
use App\Model\RewardDetail;
use App\User;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class RewardHistoryRepository
{
    public function getAll()
    {
        try
        {
            $items = RewardDetail::with('user')->get();
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
            $check = Reward::firstOrCreate(
                ['user_id' => $data['user_id']], ['user_id ' => $data['user_id']]
            );
            if($check){
                Log::info($check);
                if($data['type']==1){
                    $check->total = $check->total + $data['value'];
                }
                else {
                    $check->used = $check->used + $data['value'];
                }
                $check->save();
            }
            $check = RewardDetail::create($data);
            $data = RewardDetail::with('user')->where('id',$check->id)->first();
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
            $check = Reward::firstOrCreate(
                ['user_id' => $data['user_id']], ['user_id ' => $data['user_id']]
            );
            if($check){
                Log::info($check);
                if($data['type']==1){
                    $check->total = $check->total + $data['value'];
                }
                else {
                    $check->used = $check->used + $data['value'];
                }
                $check->save();
            }
            return [
                "message"=>"success",
                "success"=>true,
                "data"=>RewardDetail::with('user')->findOrfail($id)
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
            $data = RewardDetail::with('user')->findOrfail($id);
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
            $data = RewardDetail::findOrfail($id);
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