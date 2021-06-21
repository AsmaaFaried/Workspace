<?php

namespace App\Http\Controllers\WorkProfile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SharedArea;
use Illuminate\Support\Facades\Validator;
use App\Traits\workprofileTrait;
class AddSharedAreaController extends Controller
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
  
        return redirect()->back()->with('success',"SharedArea is added Successfuly, Add Another SharedArea if you want Or go to Next step");
        
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


    public function display(){
        $SharedArea=SharedArea::all();
        
        return view('dashboard/showSharedArea')->with('SharedArea',$SharedArea);
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
        $SharedArea=SharedArea::find($id);
        return view('dashboard/updateSharedArea')->with(['SharedArea'=>$SharedArea]);
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
        
        $rules= $this->getRules();
        $messages= $this->getMessages();
        $SharedArea=SharedArea::find($id);
        $validator =  Validator::make($request->all(),$rules,$messages);
        
        if($validator -> fails()){
           return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $SharedArea->capacity=$request->input('capacity');
        $SharedArea->price=$request->input('price');
        
            if($request->hasfile('image')){
            $file=$request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('images/SharedAreaimages/',$filename);
            $SharedArea->image =$filename;
        }
        $SharedArea->save();
        return redirect('/SharedArea')->with('SharedArea',$SharedArea);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $SharedArea=SharedArea::find($id);
        $SharedArea->delete();
        return redirect('/SharedArea')->with('Deleted','The SharedArea is deleted successfuly');
    }
}
