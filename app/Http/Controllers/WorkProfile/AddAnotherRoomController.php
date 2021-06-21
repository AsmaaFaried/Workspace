<?php

namespace App\Http\Controllers\WorkProfile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Traits\workprofileTrait;
use App\Models\Workspace;
use Illuminate\Support\Facades\Validator;


class AddAnotherRoomController extends Controller
{
 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use workprofileTrait;
   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function __construct()
    // {
    //     $this->middleware('guest');
    // }

    public function create()
    {
        return view('dashboard/addAnotherRoom');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $rules= $this->getRules();
        $messages= $this->getMessages();
        $validator =  Validator::make($request->all(),$rules,$messages);
        
        if($validator -> fails()){
           return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
          //save photos
        $file_name= $this -> saveImage($request->room_image,'images/Roomsimages/');
        $workspace= Workspace::get()->last()->id;
        //insert data in db
        Room::create([
        'workspace_id'=>$workspace,
        'room_image' => $file_name,    
        'room_type' => $request->room_type,
        'room_capacity' => $request->room_capacity,
        'room_discription'=>$request->room_discription,
        'rent_room' => $request->rent_room,
        'room_price' => $request->room_price,
        'room_price_time'=>$request->room_price_time,
        ]);
  
       return redirect()->route('showroom');  
        
    }

    protected function getRules()
    {   
        
       return [
        'room_image' => 'required|image|mimes:jpg,jpeg,bmp,svg,png',   
        'room_type' =>'required|max:255|string',
        'room_capacity' =>'required|numeric|max:255',
        'rent_room' => 'required',
        'room_price' =>'required|numeric',
        'room_price_time'=>'required',
        ];
        
    }

    protected function getMessages()
    {   
        
       return [
        'room_image.image' =>'should Select an Image',  
        'room_image.mimes' =>'should Select an Image with type jpg,jpeg,bmp,svg,png',   
        'room_type.required' =>'Please enter room type',
        'room_type.max' =>'this field should be max 255 character',
        'room_type.string' =>'please enter valid room type',
        'room_capacity.required' => "Enter max number of individuals for this room ",
        'room_capacity.numeric' => " * This field should be only numbers ",
        'room_capacity.max' => " * Room capacity should not be more than 150 indvidual ",
        'rent_room.required' => 'This field is required',
        'room_price.required' => 'please enter the price',
        'room_price.numeric' => 'This field should be only numbers',
        'room_price_time.required'=>'This field is required',
         
        ]; 
    }

    
}
