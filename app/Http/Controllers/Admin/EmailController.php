<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\EmailRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EmailController extends Controller
{
    public function sendEmail(Request $request)
    {
        $body = $request->all();
        
        try
        {   
            $repo = new EmailRepository();
            $result = $repo->sendEmail($body);
            return $result;
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
