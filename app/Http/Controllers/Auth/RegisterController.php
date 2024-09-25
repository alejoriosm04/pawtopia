<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\CustomVerifyEmailNotification;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'role' => 'regular',
            'address' => null,
            'credit_card' => null,
            'image' => null,
        ]);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $user = $this->create($request->all());

        $user->notify(new CustomVerifyEmailNotification);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath())->with('success', 'Registration completed. Please check your email to activate your account.');
    }

    protected function registered(Request $request, $user)
    {
        return redirect('/')->with('success', 'Registration completed. Please check your email to activate your account.');
    }
}
