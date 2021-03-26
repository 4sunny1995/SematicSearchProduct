<?php
namespace App\Repositories;

use App\Model\Reward;
use Exception;
use Illuminate\Support\Facades\Log;

class RewardRepository
{
    public function getAll()
    {
        try
        {
            $data = Reward::with('user')->get();
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
            $data = Reward::create($data);
            return [
                "message"=>"success",
                "success"=>true,
                "data"=>Reward::with('user')->findOrFail($data->id)
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
            $item = Reward::findOrfail($id);
            $item->update($data);
            return [
                "message"=>"success",
                "success"=>true,
                "data"=>Reward::with('user')->findOrFail($id)
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
            $data = Reward::findOrfail($id)->delete();
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
            $data = Reward::findOrfail($id);
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