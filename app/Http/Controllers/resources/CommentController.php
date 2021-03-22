<?php

namespace App\Http\Controllers\resources;

use App\Http\Controllers\Controller;
use App\Services\CommentRepository;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {   
        $this->repo = new CommentRepository();
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result  = $this->repo ->getAll();
        if($result){
            return $result;
        }
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
        $result  = $this->repo ->store($request->all());
        if($result){
            return $result;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result  = $this->repo ->getDataById($id);
        if($result){
            return $result;
        }
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
        $result  = $this->repo ->update($request->all(),$id);
        // dd($result);
        if($result){
            return $result;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result  = $this->repo ->destroy($id);
        if($result){
            return $result;
        }
    }
}
