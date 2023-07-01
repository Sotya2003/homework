<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use App\Models\users;
use App\Models\google_account;
use Illuminate\Support\Facades\Session;

class GoogleAuthController extends Controller
{
    public function redirectToGoogle()
    {
        Session::put('google_account_access',1);
        return Socialite::driver('google')->redirect();
    }
    
    public function googleCallback()
    {
        if(Session::get('google_account_access'))
        {
            $googleUser = Socialite::driver('google')->user();

            //cek akun
            $user=users::where('email',$googleUser->email)->count();
            $users=users::where('email',$googleUser->email)->get();
            foreach($users as $users);

            //cek akun google
            $google=google_account::where('google_id',$googleUser->id)->count();

            //jika akun manual ada google tidak
            if($user==1 && $google==0)
            {
                $create=google_account::create
                ([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'google_id' => $googleUser->id,
                    'permission' => 'user',
                ]);
                //update akun user
                $update=users::where('email',$googleUser->email)->update
                ([
                    'google_id' => '123',
                ]);
                Session::put('users', $users);
                Session::flash('google_account_login', 1);
                Session::forget('google_account_access');
                return redirect('/home'); 
            }

            //jika akun manual tidak ada google ada
            if($user==0 && $google==1)
            {
                Session::put('google_register',$googleUser);
                Session::forget('google_account_access');
                return redirect('/register/auth/google');
            }

            //jika akun manual ada google ada
            if($user==1 && $google==1)
            {
                Session::put('users', $users);
                Session::flash('google_account_login', 1);
                Session::forget('google_account_access');
                return redirect('/home');
            }

            //jika akun manual tidak ada google tidak ada
            if($user==0 && $google==0)
            {
                $create=google_account::create
                ([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'google_id' => $googleUser->id,
                    'permission' => 'user',
                ]);

                Session::put('google_register',$googleUser);
                Session::forget('google_account_access');
                return redirect('/register/auth/google');
            }
        }
        else
        {
            return redirect('/home');
        }
    }
}
