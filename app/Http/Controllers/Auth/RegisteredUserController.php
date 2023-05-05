<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Kreait\Firebase\Messaging;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('pages.register',[
        'web' => [
            'name' => 'صفحة التسجيل  | Box Print'
        ],
    ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $reques,Messaging $messaging): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'country' => ['required','string'],
            'phone' => ['required','numeric'],
        ]);

         $cart = Cart::create();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'country' => $request->country,
            'phone' => $request->phone,
            'cart_id' => $cart->id,
        ]);

        $fcmToken = $messaging->getToken($user->id);
        $user->fcm_token = $fcmToken;
        $user->save();

        event(new Registered($user));

        Auth::login($user);

        return  redirect(RouteServiceProvider::HOME);
    }
}
