<?php
namespace App\Repositories;

use App\Model\Credit;
use Exception;
use Illuminate\Support\Facades\Log;

class CreditRepository
{
    public function getAll()
    {
        try
        {
            $data = Credit::with('user')->get();
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
            $data = Credit::create($data);
            return [
                "message"=>"success",
                "success"=>true,
                "data"=>Credit::with('user')->findOrFail($data->id)
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
            $item = Credit::findOrfail($id);
            $item->update($data);
            return [
                "message"=>"success",
                "success"=>true,
                "data"=>Credit::with('user')->findOrFail($id)
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
            $data = Credit::findOrfail($id)->delete();
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
            $data = Credit::findOrfail($id);
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