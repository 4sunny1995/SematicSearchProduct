<?php
namespace App\Repositories;

use App\Model\CategoryParent;
use Exception;
use Illuminate\Support\Facades\Log;

class CategoryParentRepository 
{
    public function getAll()
    {
        try
        {
            $items = CategoryParent::orderBy('created_at', 'DESC')->get()->toArray();
            if(count($items)>0){
                return [
                    "message"=>"success",
                    "success"=>true,
                    "data"=>$items
                ];
            }
            else
            {
                return [
                    "message"=>"Emplty",
                    "success"=>false,
                    "data"=>[]
                ];
            }
        }
        catch(Exception $e)
        {
            Log::info($e->getMessage());
            return null;
        }
    }
}