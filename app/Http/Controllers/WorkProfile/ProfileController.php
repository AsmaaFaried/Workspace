<?php

namespace App\Http\Controllers\WorkProfile;

use App\Http\Controllers\Controller;
use App\Models\Workspace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Traits\workprofileTrait;
class ProfileController extends Controller
{
    
    // public function __construct()
    // {
    //     $this->middleware('guest');
    // }
    use workprofileTrait;
    
   

    public function create(){
        return view('dashboard/workprofile');
    }





   
    public function store(Request $request){

        
        $rules= $this->getRules();
        $messages= $this->getMessages();
        $validator =  Validator::make($request->all(),$rules,$messages);
        
        if($validator -> fails()){
           return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        
        //save photos
        $file_name= $this -> saveImage($request->profile_picture,'images/workspace/');
        $id  =auth()->user()->id;
        //insert data in db
        Workspace::create([
        'profile_picture' => $file_name,
        'name' => $request->name,
        'location' => $request->location,
        'mobile_one'=>$request->mobile_one,
        'mobile_two'=>$request->mobile_two,
        'open_time' => $request->open_time,
        'close_time' => $request->close_time,
        'serve_food'=>$request->serve_food,
        'wifi' => $request->wifi,
        
        ]);
        return redirect()->route('addroom')->with($id);
 
    }

    protected function getRules()
    {   
        
       return [
        'profile_picture' => 'required|image|mimes:jpg,jpeg,bmp,svg,png',
        'name' => 'required|string',
        'location' => 'required|string|regex:/^\d+\s[A-z]+\s[A-z]+/',
        'mobile_one' => 'numeric|required|regex:/(01)[0-9]{9}/',
        'mobile_two' => 'numeric|regex:/(01)[0-9]{9}/',
        'open_time' => 'required',
        'close_time' =>'required',
        'serve_food'=>'required',
        'wifi' =>'required',
         
        
         
        ];
        
    }

    protected function getMessages()
    {   
        
       return [
        'profile_picture.required' =>'You should enter workspace logo',
        'profile_picture.image' =>'should Select an Image with type jpg,jpeg,bmp,svg,png',
        'location.regex' => 'Enter correct location',
        'location.string' => 'Enter correct location',
        'mobile_one.numeric' => 'Moblile should be only numbers',
        'mobile_one.regex' => 'mobile number should start with 01 and contain 11 numbers',
        'mobile_two.numeric' => 'Moblile should be only numbers',
        'mobile_two.regex' => 'mobile number should start with 01 and contain 11 numbers',
        'open_time.required' => 'This field is required please select time',
        'close_time.required' => 'This field is required please select time ',
        'serve_food.required'=>'This field is required',
        'wifi.required' => 'This field is required',
         
        ];
        
    }

    

   
}



