<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Services\SocialAccountService;
// use App\SocialAccountService as AppSocialAccountService;
use Illuminate\Support\Facades\Log;
use Socialite;

class SocialAuthController extends Controller
{
    public function redirect($social)
    {
        return Socialite::driver($social)->redirect();
    }

    public function callback($social)
    {
        // dd(Socialite::driver($social));
        $user = Socialite::driver($social)->user();
        // dd($user);
        $user = SocialAccountService::createOrGetUser($user, $social);
        auth()->login($user);

        return redirect()->to('/shop');
    }
}