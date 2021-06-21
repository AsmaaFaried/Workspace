@extends('home')

@section('content')
    <div class="container">
   
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" >

                    <h3 class="card-header">{{ __('Add Another Room') }}</h3>

                    <div class="card-body">
                        
                        <form id="form-data" method="POST" action="{{ route('AddAnotherRoom') }}" enctype="multipart/form-data" >  
                        
                            @csrf

                            
                            <div class="form-group row">
                                <label for="room_image" class="col-md-4 col-form-label text-md-right">{{ __('Room image :') }}</label>

                                <div class="col-md-6">
                                <input id="room_image"  placeholder="Enter room image" type="file" accept="image/*" value="{{ old('room_image') }}" class="form-control @error('room_image') is-invalid @enderror" name="room_image">
                                
                                <div class="invalid-feedback">Example invalid custom file feedback</div>
                                    @error('room_image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>  
                            </div>
                         
                            <div class="form-group row">
                                <label for="room_type" class="col-md-4 col-form-label text-md-right">{{ __('Room type :') }}</label>
                                <div class="col-md-6">
                                    
                                    <select name="room_type" id="room_type"   class="form-control @error('room_type') is-invalid @enderror" value="{{ old('room_type') }}" required >
                                        <option value="Meeting room">{{ __('Meeting room') }}</option>
                                        <option value="SharedArea">{{ __('SharedArea') }}</option> 
                                        <option value="For Courses">{{ __('For Courses') }}</option>       
                                    </select>
                               

                                    @error('room_type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                            </div>
                            <div class="form-group row">
                                <label for="room_capacity" class="col-md-4 col-form-label text-md-right">{{ __('Number of indviduals :') }}</label>

                                <div class="col-md-6">
                                <input id="room_capacity"  placeholder="Enter indviduals number" type="text" class="form-control @error('room_capacity') is-invalid @enderror" name="room_capacity" value="{{ old('room_capacity') }}" required autocomplete="room_capacity">
                                    @error('room_capacity')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>  
                            </div>

                            <div class="form-group row">
                                <label for="room_discription" class="col-md-4 col-form-label text-md-right">{{ __('Room discription :') }}</label>

                                <div class="col-md-6">
                                <textarea id="room_discription" name="room_discription" ros="5" cols="50" value="{{ old('room_discription') }}" placeholder="Add more room discription" class="form-control @error('room_discription') is-invalid @enderror" ></textarea>
                                @error('room_discription')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>                       
                            </div>

                            <div class="form-group row">
                                <label for="rent_room" class="col-md-4 col-form-label text-md-right">{{ __('Rent option :') }}</label>

                                <div class="col-md-6">
                                    <select name="rent_room" id="rent_room" value="{{ old('rent_room') }}" class="form-control  @error('rent_room') is-invalid @enderror" required >
                                        <option value="Not available">{{ __('Not available') }}</option>
                                        <option value="Available">{{ __('Available') }}</option>
                                            
                                    </select>
                                    @error('rent_room')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>        
                            </div>

                            <div class="form-group row">
                                <label for="room_price" class="col-md-4 col-form-label text-md-right" >{{ __('Room price :') }}</label>
                                <div class="col-md-6 inline-row">
                                    
                                    <input id="room_price"  placeholder="Price of room" type="text" class="form-control @error('room_price') is-invalid @enderror" name="room_price" value="{{ old('room_price') }}" required autocomplete="room_price" />
                                    
                                    @error('room_price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    
                                    
                                    </div>          
                                </div>      
                            </div>

                            <div class="form-group row">
                                <label for="room_price_time" class="col-md-4 col-form-label text-md-right room_price_time" >{{ __('This price within :') }}</label>
                                <div class="col-md-6 inline-row">
                                    <select name="room_price_time" id="room_price_time" value="{{ old('room_price_time') }}" class="form-control  @error('room_price_time') is-invalid @enderror" required >
                                        <option value="Hour">{{ __('Hour') }}</option>
                                        <option value="Day">{{ __('Day') }}</option>
                                        <option value="Week">{{ __('Week') }}</option>
                                        <option value="Month">{{ __('Month') }}</option>        
                                    </select>

                                    @error('room_price_time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                            
                                </div>      
                            </div>

                           
                               
                                    
                                  

                            
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <a id="btn-save" href="{{route('showroom')}}" class="btn btn-outline-danger">
                                            {{ __('Cancel') }}
                                    </a>    
                                    <button id="btn-save" type="submit" class="btn btn-outline-primary">
                                        {{ __('Add Room') }}
                                    </button>
                                </div>
                            </div> 
                        </form>
                    </div>
            </div>
        </div>
      </div>
    </div>
@endsection