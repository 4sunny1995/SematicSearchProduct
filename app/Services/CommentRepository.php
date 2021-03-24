<?php
namespace App\Services;

use App\Model\Comment;
use App\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CommentRepository
{
    public function store(array $body)
    {
        try
        {
            $body['user_id'] = Auth::id();
            $id = Comment::create($body)->id;
            $comment = Comment::findOrFail($id)->toArray();
            $user = User::with('avatar')->where('id',$comment['user_id'])->first()->toArray();
           
            $comment['user'] = $user;
            if($comment){
                return [
                    "message"=>"success",
                    "success"=>true,
                    "data"=>$comment
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

    }
    public function destroy($id)
    {
        try
        {

        }
        catch(Exception $e)
        {
            Log::info($e->getMessage());
        }
    }
}