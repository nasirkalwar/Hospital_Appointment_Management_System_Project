<!DOCTYPE html>
<html lang="en">
<head>
@include('home.css')  
</head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <header>
    <div class="topbar">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 text-sm">
            <div class="site-info">
              <a href="#"><span class="mai-call text-primary"></span> +92 313 3678 240</a>
              <span class="divider">|</span>
              <a href="#"><span class="mai-mail text-primary"></span> nkalwar28@gmail.com</a>
            </div>
          </div>
          <div class="col-sm-4 text-right text-sm">
            <div class="social-mini-button">
              <a href="{{url('https://web.facebook.com/campaign/landing.php?campaign_id=1653377901&extra_1=s%7Cc%7C318307045144%7Ce%7Cfacebook%27%7C&placement&creative=318307045144&keyword=facebook%27&partner_id=googlesem&extra_2=campaignid%3D1653377901%26adgroupid%3D65139789042%26matchtype%3De%26network%3Dg%26source%3Dnotmobile%26search_or_content%3Ds%26device%3Dc%26devicemodel%3D%26adposition%3D%26target%3D%26targetid%3Dkwd-362360550869%26loc_physical_ms%3D1011081%26loc_interest_ms%3D%26feeditemid%3D%26param1%3D%26param2%3D&gclid=EAIaIQobChMIqfCC8LqCggMVvpRoCR0FkAo0EAAYASAAEgJcbvD_BwE&_rdc=1&_rdr')}}"><span class="mai-logo-facebook-f"></span></a>
              <a href="{{url('https://www.linkedin.com/uas/login?session_redirect=https%3A%2F%2Fwww.linkedin.com%2Fjobs%2Fcollections%2Frecommended%2F%3FcurrentJobId%3D3565060926')}}"><span class="mai-logo-linkedin"></span></a>
              <a href="{{url('https://twitter.com/i/flow/login')}}"><span class="mai-logo-twitter"></span></a>
              <a href="{{url('https://www.instagram.com/')}}"><span class="mai-logo-instagram"></span></a>
            </div>
          </div>
        </div> <!-- .row -->
      </div> <!-- .container -->
    </div> <!-- .topbar -->

    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="{{url('/')}}"><span class="text-primary">One</span>-Health</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupport">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{url('/')}}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('aboutus')}}">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('view_doctors')}}">Doctors</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="blog.html">News</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('contactus')}}">Contact</a>
            </li>

            @if(Route::has('login'))

            @auth

            <li class="nav-item">
              <a class="nav-link" href="{{url('/my_appointment')}}">My Apppointment </a>
            </li>

              <li><x-app-layout>
              </x-app-layout></li>
            @else
            <li class="nav-item">
              <a class="btn btn-primary ml-lg-3" href="{{Route('login')}}">Login</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-primary ml-lg-3" href="{{Route('register')}}">Register</a>
            </li>

            @endauth
            @endif
        </ul>
        </div> <!-- .navbar-collapse -->
      </div> <!-- .container -->
    </nav>
  </header>

