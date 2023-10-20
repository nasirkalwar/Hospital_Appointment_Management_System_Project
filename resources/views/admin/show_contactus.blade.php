<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
   @include('admin.css')
   <style type="text/css">
        .title_deg
        {
            font-size:30px;
            font-weight:bold;
            padding:30px;
            text-align:center;
        }
        .table_deg
        {
            border:1px solid white;
            width:70%;
            color:white;
            margin-left:100px;
            text-align:center;
        }
        .th_deg
        {
            background-color:skyblue;
            color:white;
        }
        .img_deg
        {
          height:100px;
          width:150px;  
            padding:10px;
        }
    </style>
</head>
  <body>
  <div class="container-scroller">
@include('admin.sidebar')
  <!-- partial -->
      @include('admin.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
        
        <div class="content-wrapper">


        <div class="row ">
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
                <h1 class="card-title" style="text-align:center; font-size:40px;">All Contact Us Messages</h1>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Subject</th>
                                        <th>Message</th>
                                        <th>Delete</th>
                                    </tr>
                                    <tbody>
                                    @foreach($contactus as $contactus)
                                    <tr>
                                        <td>{{$contactus->name}}</td>
                                        <td>{{$contactus->email}}</td>
                                        <td>{{$contactus->subject}}</td>
                                        <td>{{$contactus->message}}</td>
                                        <td><a href="{{url('delete_contactus',$contactus->id)}}" class="btn btn-danger" >Delete</a></td>
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