<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Rules\EmailRule;
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
    protected $redirectTo = 'workspace/profile';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    // public function __construct()
    // {
    //     $this->middleware('guest');
    // }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {   
        $rules=[
            'name' => ['required', 'string', 'max:255','regex:/(^([a-zA-z]+)(\d+)?$)/u'],
            'email' => [
                'regex:(^[a-z0-9](\.?[a-z0-9]){5,}@gmail.com)',
                'required',
                'string',
                'max:255',
                'unique:users'], 
                'mobile' => 'numeric|required|regex:/(01)[0-9]{9}/|unique:users',
                'password' => 'required|string|min:8|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
    
            ];

        $messages=  [
            
            'mobile.numeric'=>'This field should be numbers only',
            'mobile.regex'=>'must be valid mobile number',
            'mobile.unique'=>"This mobile number already exist",
            'email.unique'=>"This email already exist",
            'email.regex'=>'This should be valid email',
        ];  
       return Validator::make($data, $rules,$messages);
            
           
        
       
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
            'name' => $data['name'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'password' => Hash::make($data['password']),
        ]);
    }
     

}