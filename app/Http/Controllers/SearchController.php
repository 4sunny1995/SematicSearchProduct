<?php

namespace App\Http\Controllers;

use App\Model\Product;
use App\ProductTag;
use App\Repositories\ProductRepository;
use App\Repositories\SearchRepository;
use App\Tag;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $key = $request->search;
        $repo  = new SearchRepository();
        $result = $repo -> generation($key);
        array_unshift($result,$key);
        $tag=$repo->sortTag($result);
        $repo->updateOrCreateKey($result);
        $repo->updateOrCreateTag($result);
        $repo = new ProductRepository();
        $items = $repo ->getProducts($tag);
        // dd($tag);
        return view('searchResult',compact('tag','items'));
    }
    public function getProductByTag($id)
    {
        $tag = Tag::findOrfail($id);
        try
        {

            $result = ProductTag::with('product')->where('tag',$tag->tag)->get()->toArray();
            return view('product',compact('result'));
        }
        catch(Exception $e)
        {
            Log::info($e->getMessage());
        }
    }
}
