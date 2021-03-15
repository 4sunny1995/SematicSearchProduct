<?php
namespace App\Repositories;

use App\Mail\SendEmail;
use App\User;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class EmailRepository
{
    public function sendEmail(array $body)
    {
        try
        {
            $user = User::where('email',$body['to'])->first();
            
            if($user){
                Mail::to($user->email)->send(new SendEmail($body));
                return [
                    "message"=>"success",
                    "success"=>true,
                    "data"=>$body
                ];
            }
            else {
                return [
                    "message"=>"error",
                    "success"=>false,
                    "data"=>"You can not send to this user"
                ];
            }
            
        }
        catch(Exception $e)
        {
            Log::info($e->getMessage());
            return [
                "message"=>"error",
                "success"=>false,
                "data"=>null
            ];
        }
    }
}