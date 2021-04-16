<?php

namespace App\Http\Controllers;

use App\Model\Product;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Config;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function getCurrentUser()
    {
        return [
            "message"=>"success",
            "success"=>true,
            "data"=>Auth::user()
        ];
    }
    public function getUserById($id)
    {
        try
        {
            if(Auth::id()==$id){
                $user = User::with('avatar','information')->findOrFail($id);        
                return [
                    "message"=>"success",
                    "success"=>true,
                    "data"=>$user
                ];
            }
        }
        catch(Exception $e)
        {
            Log::info($e->getMessage());
        }
    }
    public function getByCategory(Request $request, $id)
    {
        try
        {
            $page = $request->page;
            $products = Product::where('category_parent_id',$id)->take(10*$page)->get()->toArray();
            // dd($products);
            $data = array_chunk($products,10);
            if($data){
                $data = $data[count($data)-1];
                $carts = \Cart::session(Auth::id())->getContent()->toArray();
                // dd($carts,$data);
                for($index = 0;$index<count($data);$index++)
                {
                    $data[$index]['isCart'] = false;
                    foreach($carts as $key=>$cart)
                    {
                        if($data[$index]['id']==$key){
                            $data[$index]['isCart']=true;
                            break;
                        }
                    }
                }
                return [
                    "message"=>"success",
                    "success"=>true,
                    "data"=>$data
                ];
            }
            else
            {
                return [
                    "message"=>"success",
                    "success"=>true,
                    "data"=>[]
                ];
            }
            
        }
        catch(Exception $e)
        {
            Log::info($e->getMessage());
        }
    }
    public function getLocale()
    {
       $locale = app()->getLocale();
    //    dd($locale);
       return [
           "message"=>"success",
           "success"=>true,
           "data"=>Config::get($locale, 'vi-VN')
       ];
    }
    public function getByCategoryId(Request $request, $id)
    {
        try
        {
            $page = $request->page;
            $products = Product::where('category_id',$id)->take(10*$page)->get()->toArray();
            dd($products);
            
            if($data){
                $data = array_chunk($products,10);
                $data = $data[count($data)-1];
                $carts = \Cart::session(Auth::id())->getContent()->toArray();
                // dd($carts,$data);
                for($index = 0;$index<count($data);$index++)
                {
                    $data[$index]['isCart'] = false;
                    foreach($carts as $key=>$cart)
                    {
                        if($data[$index]['id']==$key){
                            $data[$index]['isCart']=true;
                            break;
                        }
                    }
                }
                return [
                    "message"=>"success",
                    "success"=>true,
                    "data"=>$data
                ];
            }
            else
            {
                return [
                    "message"=>"success",
                    "success"=>true,
                    "data"=>[]
                ];
            }
            
        }
        catch(Exception $e)
        {
            Log::info($e->getMessage());
        }
    }
}
