<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
        try
        {
            $file = $request->file('file');
            
            $valid = $this->validImage($file->getMimeType(),$file->getSize());
            if($valid){
                $filename = $this->generateFileName($file->getClientOriginalName());
                $updated = $file->move('uploads',$filename);
                if($updated)
                return [
                    "message"=>"success",
                    "success"=>true,
                    "data"=>"uploads/".$filename
                ];
            }
            return [
                "message"=>"error",
                "success"=>false,
                "data"=>"Can not Upload"
            ]    ;  
        }
        catch(Exception $e)
        {
            Log::info($e->getMessage());
            return null;
        }
        // dd($filename,$file->getClientOriginalExtension(),$file->getRealPath(),$file->getSize());

    }   
    public function validImage($type,$size)
    {
        if($type == "image/jpeg"||$type == "image/png"){
            if($size<=5242880) //5MB
            return true;
            return false;
        }
        return false;
    }
    public function generateFileName($file)
    {
        $file = explode('.',$file);
        $str = Str::random(20);
        return $file[0]."_".$str.".".$file[1];

    }
}
