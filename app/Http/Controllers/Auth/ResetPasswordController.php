<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    protected $redirectTo = '/';

    /**
     * Override the method to save the password without encryption.
     *
     * @param  string  $password
     * @return void
     */
    protected function resetPassword(User $user, $password)
    {

        $user->password = $password;
        $user->setRememberToken(Str::random(60));

        $user->save();

        $this->guard()->login($user);

        return redirect($this->redirectPath())->with('success', 'Your password has been successfully changed.');
    }
}
