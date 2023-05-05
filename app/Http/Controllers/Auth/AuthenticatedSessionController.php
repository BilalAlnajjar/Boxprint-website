<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging;
use Kreait\Firebase\Messaging\RegistrationTokens;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('pages.login',[
            'web' => [
                'name' => 'تسجيل الدخول | Box Print'
            ],
        ]);
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $factory = (new Factory)
            ->withServiceAccount('laravel-boxprint-fcm-firebase-adminsdk-mtzv0-4d2019d6c5.json');
       $messaging = $factory->createMessaging();
        $appInstance = $messaging->getAppInstance($registrationToken);
        $registrationToken = $appInstance->token();
       $fcmToken = $messaging->getToken();


        $request->authenticate();

        $user = Auth::user();

        $user->update(['fcm_token' =>$fcmToken]);

        $request->session()->regenerate();


        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function redirectTo(){
        $user = Auth::user();
        if($user->type == "Admin"){
            return route('dashboard');
        }

        if($user->type == "user"){
            return route('home');
        }
    }
}
