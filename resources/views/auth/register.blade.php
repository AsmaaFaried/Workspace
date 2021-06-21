@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h2 class="card-header">{{ __('Register') }}</h2>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                   
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label>

                            <div class="col-md-6">
                                <input id="name"  placeholder="Enter Your Full name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email"  placeholder="Enter Your email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mobile" class="col-md-4 col-form-label text-md-right">{{ __('Mobile') }}</label>

                            <div class="col-md-6">
                                <input id="mobile"  placeholder="Ex : 012-123-456-98" type="tel" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile">
                                
                                @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password"  placeholder="Enter Your password" type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div id='show-pass'>
                                    <input type="checkbox" onclick="myFunction()">  <span> {{__('Show Password')}}  </span>
                                    
                                    <p class="text-muted">Your password must be more than 8 characters long, should contain at-least 1 Uppercase, 1 Lowercase, 1 Numeric and 1 special character.</p>
                                </div>
                                
                                
                               
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm"  placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" >
                                @error('password-confirm')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                 <a id="btn-save" href="{{route('login')}}" class="btn btn-outline-danger">
                                        {{ __('Back') }}
                                </a>  
                                <button id="btn-save" type="submit" class="btn btn-outline-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div> 
                                
                </form>
            
          </div>
        </div>
    </div>
</div>
  
@endsection
@section('scripts')
<script>
    $(document).on('click','#btn-save',function(){
        var formData= new FormData($('#form-data')[0]);
        $.ajax({
        type:'post',
        url:'{{ route('register') }}',
        data:formData,
        success:function(data){
            if(data.status == true){
                $('#success_msg').show();
 
            }
        },
        error:function(reject){
            if(data.status == false)
            $('#fail_msg').show();

        }

        });
    });
   
</script>  
@endsection