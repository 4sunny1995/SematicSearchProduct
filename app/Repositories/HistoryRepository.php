<?php
    namespace App\Repositories;

use App\Model\History;
use Exception;
use Illuminate\Support\Facades\Log;

class HistoryRepository 
    {
        public function getHistories()
        {
            try
            {
                $histories = History::orderBy('times', 'DESC')->get();
                if($histories){
                    return [
                        "message"=>"success",
                        "success"=>true,
                        "data"=>$histories
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
                $history = History::create($body);
                $history = History::findOrfail($history->id);
                $history->times = $history->times +1;
                $history->save();
                if($history){
                    return [
                        "message"=>"success",
                        "success"=>true,
                        "data"=>$history
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
                $history = History::findOrfail($id);
                if($history){
                    Log::info('-------------------Before-----------------');
                    Log::info($history);
                    $check = $history->update($body);
                    if($check){
                        Log::info('-------------------After-----------------');
                        Log::info($history);
                        return [
                            "message"=>"success",
                            "success"=>true,
                            "data"=>$history
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
                $history = History::findOrfail($id);
                $check = $history->delete();
                if($check){
                    return [
                        "message"=>"success",
                        "success"=>true,
                        "data"=>$history
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