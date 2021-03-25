<?php

namespace App\Http\Controllers;

use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function postLogin(Request $request)
    {
        try
        {
            $email = $request->email;
            $password = $request->password;
            $user = User::where('email',$email)->first();
            
            if($user){
                $pwd = Hash::check($password, $user->password);
                if($pwd){
                    Auth::login($user);
                    return redirect('/shop');
                }
                else
                {
                    return back()->with('error','Throw Exception exitis');
                }
            }
            else
            {
                return back()->with('error','Throw Exception exitis');
            }
        }
        catch(Exception $e)
        {
            Log::info($e->getMessage());
            return back()->with('error','Throw Exception exitis');
        }
    }
    public function postSignUp(Request $request)
    {
        try
        {
            $body = $request->all();
            if($body['password']!=$body['password_confirm'])return back()->with('error','The confirm password is not correct!');
            $user = User::where('email',$body['email'])->first();
            if(!$user){
                $body['password'] = Hash::make($body['password']);
                $check = User::create($body);
                if($check){
                    Auth::login($check);
                    return redirect('/shop');
                }
                else
                {
                    return back()->with('error','Throw Exception exitis');
                }
            }
            else
            {
                return back()->with('error','Email is exitis!');
            }    
            
        }
        catch(Exception $e)
        {
            Log::info($e->getMessage());
            return back()->with('error','Throw Exception exitis');
        }
    }
}
