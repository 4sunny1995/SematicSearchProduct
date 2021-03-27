<?php
namespace App\Repositories;

use App\Model\Credit;
use App\Model\CreditDetail;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class CreditHistoryRepository
{
    public function getAll()
    {
        try
        {
            $items = CreditDetail::with('user')->get();
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
            $check = Credit::firstOrCreate(
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
            $check = CreditDetail::create($data);
            $data = CreditDetail::with('user')->where('id',$check->id)->first();
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
            $check = Credit::firstOrCreate(
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
            $check = CreditDetail::findOrfail($id);
            $check->update($data);
            return [
                "message"=>"success",
                "success"=>true,
                "data"=>CreditDetail::with('user')->findOrfail($id)
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
            $data = CreditDetail::with('user')->findOrfail($id);
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
            $data = CreditDetail::findOrfail($id);
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