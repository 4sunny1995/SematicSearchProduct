<?php

namespace App\Http\Controllers;

use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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
}
