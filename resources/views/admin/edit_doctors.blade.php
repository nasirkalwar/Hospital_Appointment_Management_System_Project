<!DOCTYPE html>
<html lang="en">
  <head>
  <base href="/public">
    <!-- Required meta tags -->
   @include('admin.css')


<style type="text/css">
    .container h1
    {
        font-size:40px;
        padding:20px;
    }
    label
    {
        display:inline-block;
        width:200px;
        font-size:20px;
        color:white;
    }
    .div_center
    {
        padding-top:30px;
        color:black;
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


        <div class="container" style="text-align:center; padding-top:30px;"> 
        @if (session()->has('message'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">x</button>
        {{session()->get('message')}}
    </div>

    @endif                                
                <form action="{{url('update_doctor')}}" method="Post" enctype="multipart/form-data">
                @csrf  
                <h1>Update Doctor</h1>
                    <div class="div_center">
                        <label>Doctor Name</label>
                        <Input type="text" name="name" value="{{$doctors->name}}" Required="">
                    </div>
                    <div class="div_center">
                        <label>Dr.Speciality</label>
                        <Select name="speacility"style="color:black; width:215px;">
                            <option vlaue="{{$doctors->speacility}}">--Select--</option>
                            <option vlaue="skin">skin</option>
                            <option vlaue="heart">heart</option>
                            <option vlaue="liver">liver</option>

                        </Select>
                    </div>
                    <div class="div_center">
                        <label>Dr.Room No</label>
                        <Input type="number" name="room" value="{{$doctors->room}}" Required="">
                    </div>
                    <div class="div_center">
                        <label>Dr.Phone No</label>
                        <Input type="number" name="phone" value="{{$doctors->phone}}" Required="">
                    </div>

                    <div class="div_center">
                        <label>Dr.Image</label>
                        <Input type="file" name="file" value="{{$doctors->image}}">
                    </div>
                    <div class="div_center">
                        <button type="submit" class="btn btn-success">Submit</button>
                </form>

                </div>
            </div>
        </div>
            
    <!-- End custom js for this page -->
@include('admin.script')
</body>
</html>