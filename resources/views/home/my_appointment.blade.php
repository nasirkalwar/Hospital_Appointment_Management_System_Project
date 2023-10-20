<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
   @include('home.header')
</head>
  <body>
  @if (session()->has('message'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">x</button>
        {{session()->get('message')}}
    </div>

    @endif
    <div class="container-fluid">
        <div class="container">
    
            <h1 style="text-align:center; padding:40px; font-size:30px;">All Appointments</h1>
                        <table class="table table-striped table table-hover table table-bordered">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Date</th>
                                <th>Dr.Name & Specaility</th>
                                <th>Phone no</th>
                                <th>Massage</th>
                                <th>Status</th>
                                <th>Cancel</th>                    
                            </tr>
                            @foreach($appointment as $appointment)
                            <tr>
                                <td>{{$appointment->name}}</td>
                                <td>{{$appointment->email}}</td>
                                <td>{{$appointment->date}}</td>
                                <td>{{$appointment->doctor}}</td>
                                <td>{{$appointment->number}}</td>
                                <td>{{$appointment->message}}</td>
                                <td>{{$appointment->status}}</td>
                                <td>
                                    @if($appointment->status=='progress')
                                    <a href="{{url('/cancel_appoint',$appointment->id)}}" class="btn btn-danger" 
                                    onclick="return confirm('Are you sure to Cancel Appointment')">Cancel</a>
                                    @else
                                        <p style="color:red;">Canceled</p>
                                    @endif
                                </td>
                            </tr>
                            @endforeach

                        </table>

        </div>
    </div>

       
</body>
</html>