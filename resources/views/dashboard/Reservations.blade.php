@extends('dashboard.index')

@section('content')
  <div class="container">


      @if(Session::has('Deleted'))
          <div class="alert alert-danger" role="alert">
              {{Session::get('Deleted')}}
          </div>
      @endif

    
 

    @csrf


    
        <h1 >All room reservations</h1>


        <table class="table" style="margin: 1% auto;" aria-describedby="mydesc">
          <thead class="thead-dark">

            <tr>
              <th scope="col">Room number</th>
              <th scope="col">Phone</th>
              <th scope="col">Duration(hours)</th>
              <th scope="col">Date</th>
              <th scope="col">From</th>
              <th scope="col">To</th>
              <th scope="col">Edit</th>
              <th scope="col">Delete</th>
              <th scope="col">CheckIn</th>
              <th scope="col">CheckOut</th>
              <th scope="col">Fees</th>
            </tr>
          </thead>
          <tbody style="background-color:aliceblue;">
            @foreach($BookingRoom as $bookingRoom)
            <tr>
              <th scope="row">{{$bookingRoom->id}}</th>
              <th>{{$bookingRoom-> phone}}</th>
              <th>{{$bookingRoom->hours}}</th>
              <th>{{$bookingRoom-> date}}</th>
              <th>{{$bookingRoom-> time_from}}</th>
              <th>{{$bookingRoom-> time_to}}</th>
              <th><a href="/editBooking/{{$bookingRoom ->id}}" class="btn btn-primary" >Edit</a></th>
              <th><a href="/deletebooking/{{$bookingRoom ->id}}" class="btn btn-danger" >Delete</a></th>

              <th><a href="{{route('roomChickin')}}" checkinroom_id="{{$bookingRoom ->id}}" class="btn btn-success checkin_btn checkinbtn" >Check in</a></th>
              <th><a href="{{route('roomChickout')}}" checkoutroom_id="{{$bookingRoom ->id}}" class="btn btn-danger  checkout_btn checkoutbtn" >Check out</a></th>
              <th><a href="{{route('roomBill')}}" row_id="{{$bookingRoom ->id}}" class="btn btn-primary fees_btn" >Bill</a></th>
              
            </tr>
            @endforeach

          </tbody>
      </table>
      
      <script>

      // CheckIn ///
        $(document).on('click', '.checkin_btn', function (e) {
              e.preventDefault();

              var bookingroom_id =  $(this).attr('checkinroom_id');
              $.ajax({
                  type: 'get',
                  url: "{{route('roomChickin')}}",
                  data: {
                      '_token': "{{csrf_token()}}",
                      'id':bookingroom_id},
                  success: function (data) {},
                  error: function (reject) {}
  
  });
    });
   
    $(document).on('click', '.checkinbtn', function (e) {
              e.preventDefault();

            var bookingroom_id =$(this).attr('checkinroom_id');
            document.getElementById(bookingroom_id).disabled =true;
            alert("It is not allowed to press checkin again");
           
    });
    

    /// CheckOut ///


    $(document).on('click', '.checkout_btn', function (e) {
              e.preventDefault();

              var bookingroom_id =  $(this).attr('checkoutroom_id');
              $.ajax({
                  type: 'get',
                  url: "{{route('roomChickout')}}",
                  data: {
                      '_token': "{{csrf_token()}}",
                      'id':bookingroom_id },
                  success: function (data) {
  }, error: function (reject) {}
  }
            );
    });

   

    $(document).on('click', '.checkoutbtn', function (e) {
              e.preventDefault();

            var bookingroom_id =$(this).attr('checkoutroom_id');
            document.getElementById(bookingroom_id).disabled =true;
            alert("It is not allowed to press checkout again");
           
    });

    //  Bill ///

    $(document).on('click', '.fees_btn', function (e) {
              e.preventDefault();

              var bookingroom_id =  $(this).attr('row_id');
              $.ajax({
                  type: 'get',
                  url: "{{route('roomBill')}}",
                  data: {
                      '_token': "{{csrf_token()}}",
                      'id':bookingroom_id },
                  success: function (data) {}, 
                  error: function (reject) {}
  }
            );
    });


    
      </script>
     
      
   

    </div>
@endsection