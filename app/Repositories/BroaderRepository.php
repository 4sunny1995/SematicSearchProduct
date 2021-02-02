<?php
    namespace App\Repositories;

use App\Model\Broader;
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
    }