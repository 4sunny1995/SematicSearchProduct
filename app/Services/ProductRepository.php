<?php
namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Log;

class ProductRepository
{
    public function getByCategoryId($id)
    {
        try
        {
            
        }
        catch(Exception $e)
        {
            Log::info($e->getMessage());
        }
    }
}