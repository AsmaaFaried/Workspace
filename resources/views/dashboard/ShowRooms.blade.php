<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link href="/css/app.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous"> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <style>
    body{
      background:#212529;
    }
  </style>  
  </head>
    <body>
  <div class="container">
      @if(Session::has('Deleted'))
          <div class="alert alert-danger" role="alert">
              {{Session::get('Deleted')}}
          </div>
      @endif

    
 

    @csrf


    
        <h1 style="color:aliceblue; text-align:center;">Workspace Data </h1>

        
        <div class="form-group row mb-0" >
          <div class="col-md-6 offset-md-4">
            <a href="{{route('AddAnotherRoom')}}" class="btn btn-outline-primary" style="width:200px;">
            {{__('Add another room')}}
            </a>
            <a href="{{route('login')}}" id="btn-save" type="submit" class="btn btn-outline-success"style="margin-left: 23%;">
                  {{ __('Done') }}
              </a>
          </div>
     </div>  
  
     
       
      
        <table class="table" style="margin: 1% auto;">
          <thead class="thead-dark">

            <tr>
              <th scope="col">Id</th>
              <th scope="col">Image</th>
              <th scope="col">Type</th>
              <th scope="col">Capacity</th>
              <th scope="col">Discription</th>
              <th scope="col">For Rent</th>
              <th scope="col">Price</th>
              <th scope="col">Price Time</th>
              <th scope="col">Edit</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>
          <tbody style="background-color:aliceblue;">
            @foreach($rooms as $room)
            <tr>
              <th scope="row">{{$room->id}}</th>
              <th><img src="{{asset('images/Roomsimages/'.$room->room_image)}}" width="100px;" height="100px;" alt="Room image here" /></th>
              <th>{{$room->room_type}}</th>
              <th>{{$room->room_capacity}}</th>
              <th>{{$room->room_discription}}</th>
              <th>{{$room->rent_room}}</th>
              <th>{{$room->room_price}}</th>
              <th>{{$room->room_price_time}}</th>
              <th><a href="/editRoom/{{$room ->id}}" class="btn btn-success" >Edit</a></th>
              <th><a href="/deleteRoom/{{$room ->id}}" class="btn btn-danger" >Delete</a></th>
              
            </tr>
            @endforeach

          </tbody>
      </table>
      
     
      
   

    </div>
  </body>
</html>
