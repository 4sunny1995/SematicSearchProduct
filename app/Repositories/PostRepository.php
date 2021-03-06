<?php
namespace App\Repositories;

use App\Model\Post;
use Exception;
use Illuminate\Support\Facades\Log;

class PostRepository
{
    public function getAll()
    {
        try
        {
            $data = Post::orderBy('created_at', 'DESC')->get();
            if($data){
                return [
                    "message"=>"success",
                    "success"=>true,
                    "data"=>$data
                ];
            }
            else
            {
                return [
                    "message"=>"success",
                    "success"=>false,
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
    public function store(array $body)
    {
        try
        {
            $data = Post::create($body);
            if($data){
                return [
                    "message"=>"sucess",
                    "success"=>true,
                    "data"=>$data
                ];
            }
            return null;
        }
        catch(Exception $e)
        {
            Log::info($e->getMessage());
            return null;
        }
    }
    public function update(array $body,$id)
    {
        try
        {
            $data = Post::findOrfail($id);
            $data->update($body);
            return [
                "message"=>"sucess",
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
            $data = Post::findOrfail($id);
            $data->delete();
            return [
                "message"=>"sucess",
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
    public function getDataById($id)
    {

        try
        {

        }
        catch(Exception $e)
        {
            Log::info($e->getMessage());
            return null;
        }
    }
}