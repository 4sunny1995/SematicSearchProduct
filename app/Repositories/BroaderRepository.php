<?php
    namespace App\Repositories;

use App\Model\Broader;
use App\Model\Narrower;
use Exception;
use Illuminate\Support\Facades\Log;

class BroaderRepository 
    {
        public function getAllBroader()
        {
            try
            {
                $broaders = Broader::orderBy('created_at', 'DESC')->get();
                if($broaders){
                    return [
                        "message"=>"success",
                        "success"=>true,
                        "data"=>$broaders
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
                $broader = Broader::create($body);
                $narrow = [
                    "root"=>$body['refer'],
                    "refer"=>$body['root']
                ];
                Narrower::create($narrow);
                if($broader){
                    return [
                        "message"=>"success",
                        "success"=>true,
                        "data"=>$broader
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
                $broader = Broader::findOrfail($id);
                if($broader){
                    Log::info('-------------------Before-----------------');
                    Log::info($broader);
                    $check = $broader->update($body);
                    if($check){
                        Log::info('-------------------After-----------------');
                        Log::info($broader);
                        return [
                            "message"=>"success",
                            "success"=>true,
                            "data"=>$broader
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
                $broader = Broader::findOrfail($id);
                $check = $broader->delete();
                if($check){
                    return [
                        "message"=>"success",
                        "success"=>true,
                        "data"=>$broader
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