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
@include('admin.body')
        <!-- content-wrapper ends -->
 
    <!-- End custom js for this page -->
@include('admin.script')
</body>
</html>