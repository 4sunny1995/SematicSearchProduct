<?php
    namespace App\Repositories;

// use App\Services\UserServices;
use App\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserRepository 
    {
        public function insert(array $credentinal)
        {
            
            try
            {
                $user = new User();
                $credentinal['is_active']=0;
                $credentinal['password'] = Hash::make($credentinal['password']);
                $user->create($credentinal);
                return $user;
            }
            catch(Exception $e)
            {
                Log::info($e->getMessage());
                return null;
            }
        }
        public function checkUserLogin(array $credentinal)
        {
            try
            {
                $user = User::where('email',$credentinal['email'])->first();
                if($user){
                    if($user['is_active']==0)
                    {
                        return null;
                    }
                    $check = Hash::check($credentinal['password'], $user->password);
                    if($check){
                        return $user->toArray();
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
