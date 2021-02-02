<?php
    namespace App\Services;

use App\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserServices
    {
        public function checkUserLogin(array $credentinal)
        {
            try
            {
                $user = User::where('email',$credentinal['email'])->first();
                if($user){
                    if($user['is_active']==0)
                        return null;
                    if(Hash::check($credentinal['password'], $user->password)){
                        return $user;
                    }
                }
            }
            catch(Exception $e)
            {
                Log::info($e->getMessage());
                return null;
            }

        }
    }