<?php
namespace App\Services;

use App\Avatar;
use App\Model\Post;
use App\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PostRepository
{
    public function getAll()
    {
        try
        {
            
            $data = Post::with('likes','comments','vendor','avatar')->orderBy('created_at', 'DESC')->get()->each(function($item){    
                $item['liked'] = false;
                for($index=0;$index<count($item['likes']);$index++)
                {
                    if($item['likes'][$index]['user_id']==Auth::id())
                    $item['liked']=true;
                }
                for($index=0;$index<count($item['comments']);$index++)
                {
                    $id = $item['comments'][$index]['user_id'];
                    $user = User::with('avatar')->where('id',$id)->first();
                    $item['comments'][$index]['user'] = $user->toArray();
                    // $item['comments'][$index]['avatar'] = Avatar::where('user_id',$item['comments'][$index]['user_id']);
                }
            });
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