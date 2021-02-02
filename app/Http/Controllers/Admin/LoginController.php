<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class LoginController extends UserRepository
{
    public function checkLogin(Request $request)
    {
        $credentinal = $request->except('_token');
        $user = $this ->checkUserLogin($credentinal);
        if($user){
            $check = Auth::attempt($credentinal);
            if($check){
                return redirect('admin/dashboard');
            }
            
        }
        else
        {
            return redirect('/admin')->with('error',"Can not login");
        }
        
    }
}
