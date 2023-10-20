<div class="page-section">
    <div class="container">
      <h1 class="text-center mb-5 wow fadeInUp" style="font-size:40px;">Our Doctors</h1>

      <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search" action="{{url('doctor_search')}}" method="get">
                 @csrf
                <input type="text" class="form-control" name="search" placeholder="Search Doctors by Name & Speciality" style="text-align:center;">
                <button type="submit" class="btn btn-primary" style="width:10%;">Search</button>
            </form> 

      <div class="owl-carousel wow fadeInUp" id="doctorSlideshow">


        

      @foreach($doctor as $doctors)
      <div class="item">
          <div class="card-doctor">
            <div class="header">
              <img src="/doctorimages/{{$doctors->file}}" alt="image">
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
        <span style="padding-top:20px; ">
               {!!$doctor->withQueryString()->links('pagination::bootstrap-5')!!}
            </span> 

    </div>
  </div>
