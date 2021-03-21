<?php

namespace App\Services;

use App\SocialAccount;
use App\User;
use Illuminate\Database\Eloquent\Model;

class SocialAccountService extends Model
{
    public static function createOrGetUser($providerUser, $social)
    {
        // dd($providerUser);
        $account = SocialAccount::whereProvider($social)
            ->whereProviderUserId($providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        } else {
            $email = $providerUser->getEmail() ?? $providerUser->getNickname();
            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => $social
            ]);
            $user = User::whereEmail($email)->first();

            if (!$user) {

                $user = User::create([
                    'email' => $email,
                    'name' => $providerUser->getName(),
                    'password' => $providerUser->getName(),
                ]);
            }

            $account->user()->associate($user);
            $account->save();
            // dd($user);
            return $user;
        }
    }
    
}
