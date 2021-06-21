<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workspace</title>
    <link rel="stylesheet" href="{{URL::asset('css/dashStyle/homeStyle.css')}}">
    <link rel="stylesheet" href="{{URL::asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css')}}">
    <script src="{{URL::asset('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js')}}" charset="utf-8"></script>
    <link href="{{URL::asset('css/dashStyle/addroom.css') }}" rel="stylesheet">  </head>
  <body>
  <!-- NavBar -->
  <div class="form-group row">
                            <label for="rooms" class="col-md-4 col-form-label text-md-right" >{{ __('Meeting Rooms') }}</label>

                            <div class="col-md-6">
                                <select name="meeting_rooms" id="rooms"  class="form-control" required >                                
                                    <option value="zero Rooms">{{ __('zero Rooms') }}</option>
                                    <option value="1-5 Rooms">{{ __('1 Room') }}</option>
                                    <option value="more than 5 Rooms">{{ __('2 Rooms') }}</option> 
                                    <option value="more than 5 Rooms">{{ __('3 Rooms') }}</option> 
                                    <option value="more than 5 Rooms">{{ __('4 Rooms') }}</option> 
                                    <option value="more than 5 Rooms">{{ __('5 Rooms') }}</option>                             
                                </select>
                            </div>          
                        </div>

                        <div class="form-group row">
                            <label for="cap-room" class="col-md-4 col-form-label text-md-right">{{ __('Capacity of each room') }}</label>
                            <div class="col-md-6">
                                <select name="capacity_of_rooms" id="cap-room"  class="form-control" required >
                                    <option value="1-30 individual">{{ __('1-30 individual') }}</option>
                                    <option value="more than 30 individual">{{ __('more than 30 individual') }}</option>         
                                </select>
                            </div>        
                        </div>

                        <div class="form-group row">
                            <label for="room-feature" class="col-md-4 col-form-label text-md-right">{{ __('Add Room Features') }}</label>
                            <div class="col-md-6">
                                <textarea id="room-feature" name="add_room_features" ros="5" cols="50"  placeholder="Add Room Features" class="form-control" ></textarea>   
                            </div>
                        </div>

                        <!-- multiple image -->
                        <div class="form-group row">
                            <label for="multi_image" class="col-md-4 col-form-label text-md-right">{{ __('select Images about your place') }}</label>
                            <div class="col-md-6">
                                <input type="file" id="multi_image" name="multi_image" class="form-control" multiple value="multi_image" accept="image/*">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="office" class="col-md-4 col-form-label text-md-right">{{__('Offices for Rent')}}</label>
                            <div class="col-md-6">
                                <select name="offices_for_rent" id="office"  class="form-control" required>     
                                    <option value="available">{{ __('Available') }}</option>
                                    <option value="not-available">{{ __('Not available') }}</option>      
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="shared-area" class="col-md-4 col-form-label text-md-right">{{ __('Capacity of shared-area') }}</label>

                            <div class="col-md-6">
                                <select name="capacity_of_sharedarea" id="shared-area"  class="form-control" required >
                                    <option value="Not available">{{ __('Not available') }}</option>
                                    <option value="1-30 individual">{{ __('1-30 individual') }}</option>
                                    <option value="more than 30 individual">{{ __('more than 30 individual') }}</option>         
                                </select>
                            </div>        
                        </div>
                        <div class="form-group row">
                            <label for="workspace-info" class="col-md-4 col-form-label text-md-right">{{ __('Add more information') }}</label>

                            <div class="col-md-6">
                                <textarea id="workspace-info" name="add_more_information" ros="5" cols="50"  placeholder="Add more information about workspace" class="form-control" ></textarea>

                                
                            </div>
                        </div>


  <!-- Body -->
  <div>

  </div>

    
  </body>
</html>
      