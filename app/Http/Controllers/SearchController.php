<?php

namespace App\Http\Controllers;

use App\Repositories\SearchRepository;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $key = $request->search;
        $repo  = new SearchRepository();
        $result = $repo -> generation($key);
        array_unshift($result,$key);
        dd($result);
        return view('searchResult',compact('result'));
    }
}
