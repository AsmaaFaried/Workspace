<?php

namespace App\Traits;



Trait workspaceImagesTraits
{
    public function savePlaceImage($photo,$folder){
        if($request->hasFile($photo)){
            foreach($request->$photo as $image){
                $image_name=$image->getClientOriginalName();
                $image_extension=$image->getClientOriginalExtension();
                $newName =uniqid("",true).'.'.$image_extension;
                $image->move('images/placeImages',$newName);
            }
        }
        return $newName;
       
    }
   
}
