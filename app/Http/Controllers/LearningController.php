<?php

namespace App\Http\Controllers;

use App\Model\Product;
use App\Tag;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LearningController extends Controller
{
    public function tagLearning()
    {
        try
        {
            $products = Product::all()->each(function($product){
                if($product->hasTag){
                    Tag::updateOrCreate(
                        ['tag' => $product->hasTag],
                        []
                    );
                }
            });
            return true;
        }
        catch(Exception $e)
        {
            Log::info($e->getMessage());
            return false;
        }
    }
}
