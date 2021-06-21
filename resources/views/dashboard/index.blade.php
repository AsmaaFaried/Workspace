<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workspace</title>
    <link rel="stylesheet" href="{{URL::asset('nav/styles.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <script src="{{URL::asset('nav/scripts.js')}}"></script>
    <!-- New -->
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    

    <!-- Bootstrap core JS-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <!--New  -->
     
  </head>
  
  
  <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light">Workspace</div>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#"> <i class='fas fa-home'></i> Profile</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#"><i class='fas fa-marker'></i> Book SharedArea</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{route('bookingRoom')}}"><i class='fas fa-marker'></i> Book Room</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{route('Reservations')}}"><i class='fas fa-layer-group'></i> Reservations</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#"><i class='far fa-bell'></i> Requests</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#"><i class="fa fa-cogs"></i> Settings</a>
                </div>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <div class="container-fluid">
                        <button class="btn btn-dark" id="sidebarToggle"><i class="bi bi-list"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
</svg></i></button>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                                
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Profile</a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#"><i class='fas fa-home' style='font-size:24px'></i> Your Profile</a>
                                        <a class="dropdown-item" href="#"><i class='far fa-bell' style='font-size:24px'></i> Requests</a>
                                        <div class="dropdown-divider"></div>
                                        
                                        <a  class="dropdown-item" data-toggle="modal" data-target="#myModal"><i class="bi bi-box-arrow-left">  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
  <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
                                                </svg></i>  Logout</a>




                               
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <div id="myModal" class="modal fade" role="dialog">
                                    <div class="modal-dialog">

                                      <!-- Modal content-->
                                      <div class="modal-content">
                                        <div class="modal-header">
                                         
                                          <h4 class="modal-title">Ready to Leave?
</h4>
                                        </div>
                                        <div class="modal-body">
                                          <p>Select "Logout" below if you are ready to end your current session.</p>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <a href="{{route('login')}}" class="btn btn-primary">Logout</a>
                                        

                                        </div>
                                      </div>

                                    </div>
                                  </div>
                <!-- Page content-->
                <div class="container-fluid">
                @yield('content')
                   
                </div>
            </div>
        </div>

       
    
      
    
    <!--sidebar end-->

    <!-- <script>
        $(function () {
  $('#modalToggle').click(function() {
    $('#modal').modal({
      backdrop: 'static'
    });
  });
        </script> -->
  </body>
</html>
      