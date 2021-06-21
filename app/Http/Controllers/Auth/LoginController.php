<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
use App\User;
use Illuminate\Http\Request;
// use App\Http\Controllers\Auth\Auth;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
   

    /**
     * Create a new controller instance.
     *
     * @return void
     */
   



   
    public function username()
    {
     
        
     return 'identify';
   
    }



    public function login(Request $request){
        $input = $request->all();
       

        $value= request()->input('identify');
        $field= filter_var($value, FILTER_VALIDATE_EMAIL)? 'email' : 'mobile';
        request()->merge([$field=>$value]);
       
       
        $user=User::where('email','mobile');
     
        if(auth()->attempt(array($field=>$input['identify'],'password'=>$input['password']))){
            return redirect()->route('home');
        }
        return 'Username or Password are Wrong!!';
        
        
       
      
    }


    public function logout(){
        return redirect()->route('login');
    }

  

// $password=request()->input(key:'password');
// $user2=User::where('password');


// if($user2 != $password){

// return redirect()->back()->with('Not exist',"Password is wrong!!");
// }
}