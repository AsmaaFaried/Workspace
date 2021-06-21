@extends('dashboard.index')

@section('content')
    <div class="container">
   
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" >
                  
                    <h3 class="card-header">{{ __('Update the reservation') }}</h3>

                    <div class="card-body">
                        
                        <form id="form-data" method="POST" action="/updateBooking/{{ $BookingRoom -> id }}" enctype="multipart/form-data" >  
                        
                            @csrf
                            {{method_field('PUT')}}

                            
                            <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('phone') }}</label>

                                <div class="col-md-6">
                                    <input id="phone"  placeholder="Enter your phone number" type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{$BookingRoom->phone}}" required autocomplete="phone">
                                    
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="form-group row">
                                <label for="hours" class="col-md-4 col-form-label text-md-right">{{ __('Number of hours :') }}</label>

                                <div class="col-md-6">
                                <input id="hours"  placeholder="Enter number of hours" type="text" class="form-control @error('hours') is-invalid @enderror" name="hours" value="{{$BookingRoom->hours}}" required autocomplete="hours">
                                    @error('hours')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>  
                            </div>

                            <div class="form-group row">
                            <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Date :') }}</label>

                            <div class="col-md-6">
                                <input id="date time_tag" type="date" class="form-control @error('date') is-invalid @enderror" value="{{$BookingRoom->date}}" name="date" required />
                                
                                @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                            <div class="form-group row">
                            <label for="time_from" class="col-md-4 col-form-label text-md-right">{{ __('Duration Time From :') }}</label>

                            <div class="col-md-6">
                                <input id="time_from time_tag" type="time" class="form-control @error('time_from') is-invalid @enderror" value="{{$BookingRoom->time_from}}" name="time_from" required />
                                
                                @error('time_from')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="time_to" class="col-md-4 col-form-label text-md-right">{{ __('Duration Time To :') }}</label>

                            <div class="col-md-6">
                                <input id="time_to time_tag" type="time" class="form-control @error('time_to') is-invalid @enderror" value="{{$BookingRoom->time_to}}" name="time_to" required />
                                
                                @error('time_to')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
  
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                   

                                    <a id="btn-save" href="{{route('Reservations')}}" class="btn btn-outline-primary">
                                            {{ __('Cancel') }}
                                    </a>

                                    
                                    <button id="btn-save" type="submit" class="btn btn-outline-success">
                                        {{ __('Update') }}
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