<?php

namespace App\Http\Controllers\WorkProfile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Workspace;
use App\Traits\workprofileTrait;
use Illuminate\Support\Facades\Validator;
class AddRoomController extends Controller
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
    //     $this->middleware('auth');
    // }

    public function create()
    {
        return view('dashboard/AddRooms');
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
        //insert data in db
        Room::create([
        'workspace_id'=>$workspace_id,
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
        'room_capacity' =>'required|numeric|max:80',
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
        'rent_room.required' => 'This field is required',
        'room_price.required' => 'please enter the price',
        'room_price.numeric' => 'This field should be only numbers',
        'room_price_time.required'=>'This field is required',
         
        ]; 
    }

    

    public function display(){
        $rooms=Room::all();
        
        return view('dashboard/ShowRooms')->with('rooms',$rooms);
    }


  

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     
    public function edit($id)
    {
        $rooms=Room::find($id);
        return view('dashboard/updateRooms')->with(['rooms'=>$rooms]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rooms=Room::find($id);
        $rules= $this->getRules();
        $messages= $this->getMessages();
        $validator =  Validator::make($request->all(),$rules,$messages);
        
        if($validator -> fails()){
           return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $rooms->room_type=$request->input('room_type');
        $rooms->room_capacity=$request->input('room_capacity');
        $rooms->room_discription=$request->input('room_discription');
        $rooms->rent_room=$request->input('rent_room');
        $rooms->room_price=$request->input('room_price');
        $rooms->room_price_time=$request->input('room_price_time');
        
            if($request->hasfile('room_image')){
            $file=$request->file('room_image');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('images/Roomsimages/',$filename);
            $rooms->room_image =$filename;
        }
        $rooms->save();
        return redirect('/Rooms')->with('rooms',$rooms);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $rooms=Room::find($id);
        $rooms->delete();
        return redirect('/Rooms')->with('Deleted','The Room is deleted');
    }
}
















