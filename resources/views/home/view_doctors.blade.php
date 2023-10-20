@include('home.header')

  <div class="page-banner overlay-dark bg-image" style="background-image: url(../assets/img/bg_image_1.jpg);">
    <div class="banner-section">
      <div class="container text-center wow fadeInUp">
        <nav aria-label="Breadcrumb">
          <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Doctors</li>
          </ol>
        </nav>
        <h1 class="font-weight-normal">Our Doctors</h1>
      </div> <!-- .container -->
    </div> <!-- .banner-section -->
  </div> <!-- .page-banner -->


  
  <div class="page-section bg-light">
    <div class="container">

            <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search" action="{{url('search_doctor')}}" method="get">
                 @csrf
                <input type="text" class="form-control" name="search" placeholder="Search Doctors by Name & Speciality" style="text-align:center;">
                <button type="submit" class="btn btn-primary" style="width:10%;">Search</button>
            </form> 

      <div class="row justify-content-center">
        <div class="col-lg-10">

          <div class="row">
          @foreach($doctor as $doctors)
            <div class="col-md-6 col-lg-4 py-3 wow zoomIn">
              <div class="card-doctor">
                <div class="header">
                  <img src="/doctorimages/{{$doctors->file}}" alt="Image">
                  <div class="meta">
                    <a href="{{url('https://accounts.google.com/InteractiveLogin/signinchooser?continue=https%3A%2F%2Fmail.google.com%2Fmail%2Fu%2F0%2F&emr=1&followup=https%3A%2F%2Fmail.google.com%2Fmail%2Fu%2F0%2F&osid=1&passive=1209600&service=mail&ifkv=AVQVeyztyTWIF4sE5JcMBda7rABN19Z2KnlGsEZFbld518PNn2SiRWeUpYGZLrVJN4uS_N9cNOJRdw&theme=glif&flowName=GlifWebSignIn&flowEntry=ServiceLogin#inbox')}}"><span class="mai-mail"></span></a>
                    <a href="{{url('https://web.whatsapp.com/')}}"><span class="mai-logo-whatsapp"></span></a>
                  </div>
                </div>
                <div class="body">
                  <p class="text-xl mb-0">{{$doctors->name}}</p>
                  <span class="text-sm text-grey">{{$doctors->speacility}}</span>
                </div>
              </div>
            </div>
            @endforeach

          </div>

        
        </div>
 
    </div>
    <span style="padding-top:20px; ">
               {!!$doctor->withQueryString()->links('pagination::bootstrap-5')!!}
            </span>     
  
</div> <!-- .container -->
  </div> <!-- .page-section -->

  @include('home.appointment')

  
  @include('home.footer')