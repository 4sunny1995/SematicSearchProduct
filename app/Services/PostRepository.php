<?php
namespace App\Services;

use App\Model\Post;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PostRepository
{
    public function getAll()
    {
        try
        {
            
            $data = Post::with('likes','comments','vendor')->orderBy('created_at', 'DESC')->get()
            // for($index = 0;$index<count($data);$index++)
            // {
            //     $data[$index]['liked'] = false;
            //     for($i = 0 ;$i<count($data[$index]['likes']);$i++)
            //     {
            //         if($data[$index]['likes'][$i]['id']==Auth::id())
            //         {
            //             $data[$index]['liked'] = true;
            //         }
            //     }
            // }
            
            ->each(function($item){    
                $item['liked'] = false;
                for($index=0;$index<count($item['likes']);$index++)
                {
                    if($item['likes'][$index]['user_id']==Auth::id())
                    $item['liked']=true;
                    // dd($item->toArray(),$item['likes'][$index]->toArray(),Auth::id());
                }
            });
            // dd($data->toArray());
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