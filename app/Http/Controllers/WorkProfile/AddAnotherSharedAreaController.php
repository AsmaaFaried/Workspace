<?php

namespace App\Http\Controllers\WorkProfile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddAnotherSharedAreaController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('guest');
    // }

    public function create()
    {
        return view('dashboard/AddSharedArea');
    }

    use workprofileTrait;
    public function store(Request $request)
    {
        
        $rules= $this->getRules();
        $messages= $this->getMessages();
        $validator =  Validator::make($request->all(),$rules,$messages);
        
        if($validator -> fails()){
           return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
          //save photos
        $file_name= $this -> saveImage($request->image,'images/SharedAreaimages/');
        
        //insert data in db
        SharedArea::create([
        'image' => $file_name,    
        'capacity' => $request->capacity,
        'price' => $request->price,
     
        ]);
  
        return redirect()->back()->with('success',"Table is added Successfuly, Add Another table if you want Or go to Next step");
        
    }

    protected function getRules()
    {   
        
       return [
        'image' => 'required|image|mimes:jpg,jpeg,bmp,svg,png',   
        'capacity' =>'required|numeric',
        
        'price' =>'required|numeric',
     
        ];
        
    }

    protected function getMessages()
    {   
        
       return [
        'image.image' =>'should Select an Image',  
        'image.mimes' =>'should Select an Image with type jpg,jpeg,bmp,svg,png',   
        'capacity.required' => "Enter max number of individuals for this table ",
        'capacity.numeric' => " * This field should be only numbers ",
        'price.required' => 'please enter the price',
        'price.numeric' => 'This field should be only numbers',
         
        ]; 
    }
}
