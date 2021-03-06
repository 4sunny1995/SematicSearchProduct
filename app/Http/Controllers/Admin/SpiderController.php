<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\SpiderRepository;
use Illuminate\Http\Request;

class SpiderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.spider');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data  = $request->validate([
            'domain' => 'required|max:255|min:6',
            'url' => 'required|max:255|min:6',
            'priceProduct' => 'required|max:255',
            'nameProduct'=>'required|max:255',
            'imageProduct'=>'required|max:255',
            'hastag'=>'max:255',
            'listProduct'=>'required|max:255'
        ]);
        $repo = new SpiderRepository();
        $result = $repo -> crawlerByGoutte($request->all());
        // dd($result);
        return view('admin/resultCrawler',compact('result'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function reSpiderAll()
    {
        dd(12);
        $repo = new SpiderRepository();
        $result = $repo -> reSpiderAll();
        if($result){
            return $result;
        }
    }
    public function reSpiderItem(Request $request)
    {
        $repo = new SpiderRepository();
        $result = $repo -> reSpiderItem($request->all());
        if($result){
            return $result;
        }
    }
}
