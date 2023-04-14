<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Laravel\Socialite\Facades\Socialite;

class ProviderController extends Controller
{
    public function redirect($provider) {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider) {
        try {
            $SocialUser = Socialite::driver($provider)->user();
            if(User::where('email', $SocialUser->getEmail())->exists()) {
                return redirect()->route('login')->withErrors(['email', 'Email ini menggunakan metode yang berbeda untuk masuk']);
            }

            $user = User::where([
                'provider' => $provider,
                'provider_id' => $SocialUser->id,
            ])->first();
            
            if(!$user) {
                $createUser = User::create([
                    'name' => $SocialUser->getName(),
                    'email' => $SocialUser->getEmail(),
                    'username' => User::generateUsername($SocialUser->getNickname()),
                    'provider' => $provider,
                    'provider_id' => $SocialUser->getId(),
                    'provider_token' => $SocialUser->token,
                    'email_verified_at' => now(),
                ]);

                $createUser->channel()->create([
                    'name' => $SocialUser->getName(),
                    'slug' => Str::slug($SocialUser->getName(), '-'),
                    'uid' => \uniqid(true)
                ]);

                Auth::login($createUser);
                return redirect()->route('home');
            } else {
                Auth::login($user);
                return redirect()->route('home');
            }
        } catch (\Exception $e) {
            return redirect('/v1/login');
        }
    }
}
