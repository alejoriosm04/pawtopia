<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Validation\Validator as ValidatorContract;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest');
        parent::__construct();
    }

    protected function validator(array $data): ValidatorContract
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data): User
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

    public function register(Request $request): RedirectResponse
    {
        $this->validator($request->all())->validate();

        $user = $this->create($request->all());

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath())->with('success', 'Registration completed.');
    }

    protected function registered(Request $request, $user): RedirectResponse
    {
        return redirect('/')->with('success', 'Registration completed.');
    }
}
