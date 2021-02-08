<?php
    namespace App\Repositories;

    use App\Model\Broader;
use App\Model\History;
use App\Model\Narrower;
use Exception;
    use Illuminate\Support\Facades\Log;
    class DashBoardRepository
    {
        public function getBroader($limit)
        {
            try
            {
                $data = Broader::orderBy('created_at', 'DESC')->take($limit)->get();
                return [
                    "message"=>"success",
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
        public function getNarrower($limit)
        {
            try
            {
                $data = Narrower::orderBy('created_at', 'DESC')->take($limit)->get();
                return [
                    "message"=>"success",
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
        public function getHistory($limit)
        {
            try
            {
                $data = History::orderBy('created_at', 'DESC')->take($limit)->get();
                return [
                    "message"=>"success",
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
    }