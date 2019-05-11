<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SocialAccountService;
use Laravel\Socialite\Contracts\User as ProviderUser;
use App\SocialAccount;
use App\User;
use Illuminate\Support\Facades\Log;
use Socialite;

class SocialAuthController extends Controller
{
    public function redirect($social){
      //this function will redirect to Facebook
      return Socialite::driver($social)->scopes([
          "manage_pages", "publish_pages"])->redirect();
    }

    public function callback($social){
      //fire when facebook callback
      $user = $this->createOrGetUser(Socialite::driver($social)->user(),$social);
      auth()->login($user);

      return redirect()->to('/admin');
    }

    private function createOrGetUser(ProviderUser $providerUser,$social){
      $account = SocialAccount::whereProvider($social)->whereProviderUserId($providerUser->getId())->first();

      if($account){
        return $account->user;
      }else{
        //create a new user

        $email = $providerUser->getEmail() ?? $providerUser->getNickname();
        //dd($providerUser->token);
        //create to social_account table
        $account = new SocialAccount();
        $account->provider_user_id  = $providerUser->getId();
        $account->provider = $social;
        if($providerUser->token != "") $account->provider_token = $providerUser->token;

        //check if the user exist
        $user = User::whereEmail($email)->first();

        if(!$user){
          $user = User::create([
            'email' => $email,
            'name' => $providerUser->getName(),
            'password' => $providerUser->getName(),
          ]);
        }

        $account->user()->associate($user);
        $account->save();

        return $user;
      }
    }
}
