<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- css files -->
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

        <div >
                        <ul class="navbar-nav w-100">
                            <li class="nav-item w-100">
                                <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search" action="{{url('doctor_search')}}" method="get">
                                    @csrf
                                    <input type="text" name="search" class="form-control" placeholder="Search Doctor By Name & Speaciality " style="text-align:center;">
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
                <h1 class="card-title" style="text-align:center; font-size:40px;">All Doctors</h1>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Doctor Name</th>
                                <th>Dr.Speciality</th>
                                <th>Dr.Room No</th>
                                <th>Dr.Phone No</th>
                                <th>Dr.Image</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($doctor as $doctors)
                            <tr>
                                <td>{{$doctors->name}}</td>
                                <td>{{$doctors->speacility}}</td>
                                <td>{{$doctors->room}}</td>
                                <td>{{$doctors->phone}}</td>
                                <td><img class="img_deg" src="doctorimages/{{$doctors->file}}"></td>
                                <td><a href="{{url('delete_doctors',$doctors->id)}}" class="btn btn-danger" >Delete</a></td>
                                <td><a href="{{url('edit_doctors',$doctors->id)}}" class="btn btn-success">Edit</a></td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
               </div>
            </div>
        </div>
        </div>

       
       
    @include('admin.script')
</body>
</html>