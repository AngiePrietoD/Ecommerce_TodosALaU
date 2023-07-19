<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Verified;
use Illuminate\Contracts\Auth\PasswordBroker;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class SecurityController extends Controller
{
    public function verifyEmail(Request $request)
    {
        if(!Auth::loginUsingId($request->route('id'))) {
            return redirect(url(route('dashboard', false)));
        }
        
        $email = $request->user()->email;
        
        if (!$status = $request->user()->hasVerifiedEmail()) {
            $request->user()->markEmailAsVerified();

            event(new Verified($request->user()));
        }
        
        $credentials = [
            'email' => $email,
            'password' => config('app.key')
        ];
        
        if (Auth::attempt($credentials)) {
            $token = app(PasswordBroker::class)->createToken($request->user());
            Auth::logout();
            return redirect(url(route('password.reset', [
                'token' => $token,
                'email' => $email,
            ], false)))
                ->with('flash.bannerStyle', 'danger')
                ->with('flash.banner', '¡Se requiere que defina una contraseña!');
        } else {

            if ($status) {
                Auth::logout();
            }

            return redirect(url(route('dashboard', false)))
                ->with('flash.bannerStyle', 'success')
                ->with('flash.banner', '¡Su cuenta ha sido activada con éxito!');
        }
    }
}
