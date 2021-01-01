<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Profile;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => ['required', 'string', 'min:3', 'max:50'],
            'lastname' => ['required', 'string', 'min:3', 'max:50'],
            'username' => ['required', 'string', 'min:6', 'max:50', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'password_confirmation' => ['required', 'same:password'],
        ],[

            'firstname.required' => 'First Name is required',
            'firstname.min' => 'first Name must be at least 3 characters.',
            'firstname.max' => 'First Name should not be greater than 50 characters.',
            'firstname.string' => 'First name is Invalid.',

			'lastname.required' => 'Last Name is required',
            'lastname.min' => 'Last Name must be at least 3 characters.',
            'lastname.max' => 'Last Name should not be greater than 50 characters.',
            'lastname.string' => 'First name is Invalid.',

            'password_confirmation.same' => 'the Passwords must match',
            
            
            'email.unique' => 'this email is already been used , try to login.',

        ]);
       
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        return User::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'username' => $data['username'],
            'email' => $data['email'],
            'pictue' => 'fff',
            'password' => Hash::make($data['password']),
        ]);
    }
}

