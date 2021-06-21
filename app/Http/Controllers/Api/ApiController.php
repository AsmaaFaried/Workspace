<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Workspace;
use App\Models\Room;
use App\Models\BookingRoom;
class ApiController extends Controller
{
    
   
   
    
   
    // public function store(Request $request){

    //     Workspace::create([
    //     'profile_picture' => $file_name,
    //     'name' => $request->name,
    //     'location' => $request->location,
    //     'mobile_one'=>$request->mobile_one,
    //     'mobile_two'=>$request->mobile_two,
    //     'open_time' => $request->open_time,
    //     'close_time' => $request->close_time,
    //     'serve_food'=>$request->serve_food,
    //     'wifi' => $request->wifi,
        
    //     ]);
        
       
    
      
    //     return redirect()->route('addroom');;
 
    // }

    public function getAllWorkspaces(){
       $workspaces = Workspace::get();
       
       return response()->json($workspaces);

    }


    public function getAllWorkspacesRooms($workspace_id){
        $workspace = Workspace::find($workspace_id);
        if(!$workspace){
            return 'This workspace does not exist in database';
        }
        $rooms = $workspace->rooms;
        return response()->json($rooms);
 
     }
     
    public function getAllBookingRooms($workspace_id){
        $workspace = Workspace::find($workspace_id);
        if(!$workspace){
            return 'This workspace does not exist in database';
        }
        $reservations = $workspace->booking_rooms;
        return response()->json($reservations);
 
     }



    public function BookRoom(Request $request){
        
        $bookingRoom =new BookingRoom;

        $bookingRoom->workspace_id = $request->workspace_id;
        $bookingRoom->phone = $request->phone;
        $bookingRoom->max_num = $request->max_num;
        $bookingRoom->hours = $request->hours;
        $bookingRoom->date = $request->date;
        $bookingRoom->time_from = $request->time_from;
        $bookingRoom->time_to = $request->time_to;
        
        if($bookingRoom->save()){
            return 'Booking Rooms is added successfully';
        }


    }

    public function searchWorkspace($name){
        Workspace::get();
        return Workspace::where('name','like',"%".$name."%")->get();
        
            }

   
   

   
}



