<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        Log::info('Login attempt:', [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);

        $user = User::where('email', $request->input('email'))->first();
        if ($user) {
            Log::info('User found:', ['email' => $user->email]);

            if (! $user->email_verified_at) {
                Log::warning('User has not verified email:', ['email' => $user->email]);

                return redirect()->back()->withErrors([
                    'email' => 'Please verify your email address before logging in.',
                ]);
            }

            if ($request->input('password') === $user->password) {
                Log::info('Password matches for user:', ['email' => $user->email]);
                auth()->guard('web')->login($user);

                return redirect()->intended($this->redirectPath());
            } else {
                Log::warning('Password does not match for user:', ['email' => $user->email]);
            }
        } else {
            Log::warning('User not found:', ['email' => $request->input('email')]);
        }

        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }
}
