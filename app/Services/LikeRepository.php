<?php
namespace App\Services;

use App\Model\Like;
use App\Model\Post;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LikeRepository
{
    public function store(array $body)
    {
        try
        {
            $body['user_id'] = Auth::id();
            $check = Like::create($body);
            if($check){
                $post = Post::with('likes','comments','vendor','avatar')->where('id',$body['post_id'])->first();
                $post['liked']=true;
                return [
                    "message"=>"success",
                    "success"=>true,
                    "data"=>$post
                ];
            }
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
            $like = Like::where('post_id',$id)->where('user_id',Auth::id())->first();
            $check = $like->delete();
            if($check){
                $post = Post::with('likes','comments','vendor','avatar')->where('id',$id)->first();
                $post['liked']=false;
                return [
                    "message"=>"success",
                    "success"=>true,
                    "data"=>$post
                ];
            }
        }
        catch(Exception $e)
        {
            Log::info($e->getMessage());
        }
    }
}