<?php
    namespace App\Repositories;

use App\Model\Narrower;
use Exception;
use Illuminate\Support\Facades\Log;

class NarrowerRepository 
    {
        public function getAllNarrower()
        {
            try
            {
                $Narrowers = Narrower::orderBy('created_at', 'DESC')->get();
                if($Narrowers){
                    return [
                        "message"=>"success",
                        "success"=>true,
                        "data"=>$Narrowers
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
        public function insert(array $body)
        {
            try
            {
                $Narrower = Narrower::create($body);
                if($Narrower){
                    return [
                        "message"=>"success",
                        "success"=>true,
                        "data"=>$Narrower
                    ];
                    return null;
                }
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
                Log::info($body);
                $Narrower = Narrower::findOrfail($id);
                if($Narrower){
                    Log::info('-------------------Before-----------------');
                    Log::info($Narrower);
                    $check = $Narrower->update($body);
                    if($check){
                        Log::info('-------------------After-----------------');
                        Log::info($Narrower);
                        return [
                            "message"=>"success",
                            "success"=>true,
                            "data"=>$Narrower
                        ];
                    }
                    return null;
                }
                return null;
            }
            catch(Exception $e)
            {
                Log::info($e->getMessage());
                return null;
            }
        }
        public function delete($id)
        {
            try
            {
                $Narrower = Narrower::findOrfail($id);
                $check = $Narrower->delete();
                if($check){
                    return [
                        "message"=>"success",
                        "success"=>true,
                        "data"=>$Narrower
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
    }