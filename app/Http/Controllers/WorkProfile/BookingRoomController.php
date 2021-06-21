<?php

namespace App\Http\Controllers\WorkProfile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\BookingRoom;
use App\Models\Checkinroom;
use App\Models\Checkoutroom;
use App\Models\Fee;
use Carbon\Carbon;
class BookingRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard/BookRoom');
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
       
        $id  =auth()->user()->id;
        //insert data in db
        BookingRoom::create([
        
        'workspace_id'=>$id,
        'phone' => $request->phone,
        'max_num' =>$request->max_num,
        'hours' =>$request->hours,
        'time_from' => $request->time_from,
        'time_to' => $request->time_to,
        'date'=>$request->date,
        ]);
       
      return redirect()->back()->with('success','Your booking is added successfully');  
    }
    protected function getRules()
    {   
        
       return [
      
        'phone' => 'numeric|required|regex:/(01)[0-9]{9}/',
        'max_num' =>'required|numeric',
        'hours' =>'required|numeric',
        'time_from' => 'required',
        'time_to' =>'required',
        'date'=>'required',

         
        
         
        ];
        
    }

    protected function getMessages()
    {   
        
       return [
        'phone.numeric' => 'Moblile should be only numbers',
        'phone.regex' => 'mobile number should start with 01 and contain 11 numbers',
        'max_num.numeric' => " * This field should be only numbers ",
        'hours.numeric' => " * This field should be only numbers ",
        'time_from.required' => 'This field is required please select time',
        'time_to.required' => 'This field is required please select time ',
        'date.required'=>'This field is required',
         
        ];
        
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function display()
    {
       $BookingRoom=BookingRoom::all();
        
        return view('dashboard/Reservations')->with('BookingRoom',$BookingRoom);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $BookingRoom = BookingRoom::find($id);
        
        return view('dashboard/updateReservations')->with('BookingRoom',$BookingRoom);
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
       $BookingRoom = BookingRoom::find($id);

        $rules= $this->getRules();
        $messages= $this->getMessages();
        $validator =  Validator::make($request->all(),$rules,$messages);
        
        if($validator -> fails()){
           return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
       $BookingRoom->phone = $request->input('phone');
       $BookingRoom->hours = $request->input('max_num');
       $BookingRoom->hours = $request->input('hours');
       $BookingRoom->date = $request->input('date');
       $BookingRoom->time_from = $request->input('time_from');
       $BookingRoom->time_to = $request->input('time_to');
       $BookingRoom->save();
        return redirect()->route('Reservations')->with('BookingRoom',$BookingRoom);  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
       $BookingRoom = BookingRoom::find($id);
       $BookingRoom->delete();
        return redirect()->route('Reservations')->with('Deleted','The reservation is deleted successfully');
    }


    public function checkinroom(Request $request)
    {
       $current_time = Carbon::now('Africa/Cairo')->format('H:i:s');
       Checkinroom::create([
           'chechin' => $current_time,
           'bookingroom_id' => $request->id
       ]);
    }

    public function checkoutroom(Request $request)
    {
       $current_time = Carbon::now('Africa/Cairo')->format('H:i:s');
        
       Checkoutroom::create([
           'chechout' => $current_time,
           'bookingroom_id' => $request->id
       ]);
    }

    public function fees(Request $request)
    {
       $fees=0;
       $indiduals= BookingRoomDB::select('max_num')->where('id','=',$request->id)->get()->first();
       $start= checkin::select('checkin')->where('bookingroom_id','=',$request->id)->get()->first();
       $exit= checkout::select('checkout')->where('bookingroom_id','=',$request->id)->get()->first();
       $st = $start->checkin;
       $nd = $exit->checkout;
       $indv = $indiduals->max_num;
       $from = Carbon::parse($nd);
       $to = Carbon::parse($st);
       $hour_diff = $to->diffInHours($from);
       
      if($hour_diff<2){
          $fees = 150;
      }else{
          $fees=300;
      }
      $bill=$fees * $indv;
      Fee::create([
          'fees' =>$bill,
          'bookingroom_id' =>$request->id
      ]);
      return $indiduals;
    }


}
