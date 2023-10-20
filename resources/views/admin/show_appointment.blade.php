<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
   @include('admin.css')
</head>
  <body>
  <div class="container-scroller">
@include('admin.sidebar')
  <!-- partial -->
      @include('admin.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
        
        <div class="content-wrapper">


                <div>
                        <ul class="navbar-nav w-100">
                            <li class="nav-item w-100">
                                <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search" action="{{url('search_appoint_req')}}" method="get">
                                    @csrf
                                    <input type="text" name="search" class="form-control" placeholder="Search Doctor By Name" style="text-align:center;">
                                    <button type="submit" class="btn btn-primary" style="width:10%; ">Search</button>
                                </form>
                            </li>
                        </ul>
                    </div>


                @if (session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">x</button>
                {{session()->get('message')}}
            </div>

    @endif

    <div class="row ">
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
                <h1 class="card-title" style="text-align:center; font-size:40px;">All Appointment Requests</h1>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Date</th>
                                            <th>Dr.Name & Specaility</th>
                                            <th>Phone no</th>
                                            <th>Massage</th>
                                            <th>Status</th>
                                            <th>Delete</th>
                                            <th>Cancel</th>
                                            <th>Approved</th>
                                            <th>Send Mail</th>
                                        </tr>
                                        <tbody>
                                        @foreach($appointment as $appointment)
                                        <tr>
                                            <td>{{$appointment->name}}</td>
                                            <td>{{$appointment->email}}</td>
                                            <td>{{$appointment->date}}</td>
                                            <td>{{$appointment->doctor}}</td>
                                            <td>{{$appointment->number}}</td>
                                            <td>{{$appointment->message}}</td>
                                            <td>{{$appointment->status}}</td>
                                            <td><a href="{{url('/delete_appoint',$appointment->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure to delete Appointment')">Delete</a></td>
                                            <td><a href="{{url('/cancel_appoint',$appointment->id)}}" class="btn btn-danger">Cancel</a></td>
                                            <td><a href="{{url('/approved_appoint',$appointment->id)}}" class="btn btn-success">Approved</a></td>
                                            <td><a href="{{url('/send_mail',$appointment->id)}}" class="btn btn-primary">Email</a></td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                        </table>
                    </div>
               </div>
            </div>
        </div>
    </div>
    <!-- End custom js for this page -->
@include('admin.script')
</body>
</html>