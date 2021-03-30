<?php
namespace App\Repositories;

use App\Model\CrawlerHistory;
use Exception;
use Illuminate\Support\Facades\Log;

class CrawlerHistoryRepository
{
    public function getAll()
    {
        try
        {
            $data = CrawlerHistory::all();
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
    public function store(array $data)
    {
        try
        {
            $data = CrawlerHistory::updateOrCreate(
                [
                    'url' => $data['url'],
                    'listProduct' => $data['listProduct']
                ],
                [
                    'nameProduct' => $data['nameProduct'],
                    'priceProduct' => $data['priceProduct'],
                    'imageProduct' => $data['imageProduct'],
                    'hasTag' => $data['hasTag'],
                    'category' => $data['category']
                ]
            );
            return [
                "message"=>"success",
                "success"=>true,
                "data"=>CrawlerHistory::findOrFail($data->id)
            ];
        }
        catch(Exception $e)
        {
            Log::info($e->getMessage());
            return null;
        }
    }
    public function update(array $data,$id)
    {
        try
        {
            $item = CrawlerHistory::findOrfail($id);
            $item->update($data);
            return [
                "message"=>"success",
                "success"=>true,
                "data"=>CrawlerHistory::findOrFail($id)
            ];
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
            $data = CrawlerHistory::findOrfail($id)->delete();
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
    public function show($id)
    {
        try
        {
            $data = CrawlerHistory::findOrfail($id);
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