<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'PRASDEL') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/materialdesignicons.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<style media="screen">
  .dashboard li{
    display:block;
  },
  .panel-title{
    
  }
</style>

</head>
<body>
  <div class="page text-center">
    <header class="page-head slider-menu-position">

        <div class="rd-navbar-wrap">
          <nav data-md-device-layout="rd-navbar-fixed" data-lg-device-layout="rd-navbar-static" class="rd-navbar container rd-navbar-floated rd-navbar-dark rd-navbar-dark-transparent" data-lg-auto-height="true" data-md-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-stick-up="true">
            <div class="rd-navbar-inner">
              <div class="rd-navbar-panel">
                <button data-rd-navbar-toggle=".rd-navbar, .rd-navbar-nav-wrap" class="rd-navbar-toggle"><span></span></button>
                <button data-rd-navbar-toggle=".rd-navbar, .rd-navbar-right-buttons" class="rd-navbar-right-buttons-toggle"><span></span></button>
                <div class="rd-navbar-brand"><a href="index.html"><img src='images/logo.png' class="img-responsive" alt=''/></a></div>
              </div>
              <div class="rd-navbar-menu-wrap">
                <div class="rd-navbar-nav-wrap">
                  <div class="rd-navbar-mobile-scroll">
                    <div class="rd-navbar-mobile-brand"><a href="index.html"><img width='218' height='35' src='images/logo.png' alt=''/></a></div>
                    @if (Auth::guest())
                    <ul class="rd-navbar-nav">
                    										<li class="active"><a href="/"><span>Home</span></a></li>
                    										<li class=""><a href="/vacanties"><span>Vacanties</span></a></li>
                                        <li class=""><a href="/posts"><span>Skills/Tips</span></a></li>
                    										<li class=""><a href="/company/login"><span>Employers</span></a></li>
                                        <li><a href="{{ route('login') }}">JOB Seeker</a></li>
                    									</ul>

                    @else
                    <ul class="rd-navbar-nav">
                                        <li class="active"><a href="/"><span>Home</span></a></li>
                                        <li class=""><a href="/vacanties"><span>Vacanties</span></a></li>
                                        <li class=""><a href="/posts"><span>Skills/Tips</span></a></li>
                                        <li class=""><a href="/company/login"><span>Employers</span></a></li>
                                        <li class="dropdown"  style="margin-left:30px;">
                                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categories<span class="caret"></span></a>
                                          <ul class="dropdown-menu">
                                              <li class="text-primary"><a href="/trainings/all">All</a></li>
                                              <li class="text-primary"><a href="jobs/employment/freelance.html">Freelance</a></li>
                                              <li class="text-primary"><a href="jobs/employment/full-time.html">Full Time</a></li>
                                              <li class="text-primary"><a href="jobs/employment/internship.html">Internship</a></li>
                                              <li class="text-primary"><a href="jobs/employment/part-time.html">Part Time</a></li>
                                              <li class="text-primary"><a href="jobs/employment/temporary.html">Temporary</a></li>

                                          </ul>
                                        </li>


                                        <li><a href="/dashboard">Dashboard</a></li>
                                          <li class="dropdown">
                                              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                                  {{ Auth::user()->name }} <span class="caret"></span>
                                              </a>

                                              <ul class="dropdown-menu" role="menu">
                                                  <li>
                                                      <a href="{{ route('logout') }}"
                                                          onclick="event.preventDefault();
                                                                   document.getElementById('logout-form').submit();">
                                                          Logout
                                                      </a>

                                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                          {{ csrf_field() }}
                                                      </form>
                                                   </li>
                                              </ul>
                                          </li>
                                      </ul>


                    <ul class="nav navbar-nav navbar-right">


                    @endif
                  </div>
                </div>


              </div>
            </div>
          </nav>
        </div>
      </header>


      @yield('content')

</div>

<footer class="section-relative section-top-66 section-bottom-34 page-footer bg-gray-darkest">
    <div class="shell">
      <div class="range range-sm-center text-md-left">
        <div class="cell-sm-12 cell-md-12">
          <div class="range range-xs-center text-left">
            <div class="cell-xs-4 cell-md-2 cell-sm-6 offset-top-50 offset-md-top-0 text-left">
              <h6 class="text-uppercase text-spacing-60 font-default text-white">Different Sector</h6>
              <div class="reveal-block">
                <div class="reveal-inline-block">
                                      <ul class="list list-unstyled list-inline-primary">
                                                                    <li class="text-primary">
                        <a href="jobs/sector/sales-and-marketing.html">Sales and Marketing</a>
                      </li>
                                                                  <li class="text-primary">
                        <a href="jobs/sector/manufacturing-and-production.html">Manufacturing And Production</a>
                      </li>
                                                                    <li class="text-primary">
                        <a href="jobs/sector/education.html">Education</a>
                      </li>
                                                                    <li class="text-primary">
                        <a href="jobs/sector/food-services.html">Food Services</a>
                      </li>
                                                                    <li class="text-primary">
                        <a href="jobs/sector/construction.html">Construction</a>
                      </li>
                                                                    <li class="text-primary">
                        <a href="jobs/sector/architecture-and-engineering.html">Architecture And Engineering</a>
                      </li>
                                          <li class="text-primary">
                      <a href="jobs/sector/all.html">All Sectors</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="cell-xs-4 cell-md-3 cell-sm-6 offset-top-50 offset-md-top-0 cell-md-push-3 text-left">
              <h6 class="text-uppercase text-spacing-60 font-default text-white">favourites Category</h6>
              <div class="reveal-block">
                <div class="reveal-inline-block">
                                      <ul class="list list-unstyled list-inline-primary">
                                                                    <li class="text-primary">
                        <a href="jobs/category/website-developer.html">Website Developer</a>
                      </li>
                                                                    <li class="text-primary">
                        <a href="jobs/category/machinist.html">Machinist</a>
                      </li>
                                                                    <li class="text-primary">
                        <a href="jobs/category/police-officer.html">Police Officer</a>
                      </li>
                                                                    <li class="text-primary">
                        <a href="jobs/category/biologist.html">Biologist</a>
                      </li>
                                                                    <li class="text-primary">
                        <a href="jobs/category/personal-injury-paralegal.html">Personal Injury Paralegal</a>
                      </li>
                                                                    <li class="text-primary">
                        <a href="jobs/category/front-end-developer.html">Front End Developer</a>
                      </li>
                                        </ul>
                </div>
              </div>
            </div>


            <div class="cell-xs-4 cell-md-3 cell-sm-6 offset-top-50 offset-md-top-0 cell-md-push-3 text-left">
              <h6 class="text-uppercase text-spacing-60 font-default text-white">Available Types</h6>
              <div class="reveal-block">
                <div class="reveal-inline-block">
                  <ul class="list list-unstyled list-inline-primary">
                    <li class="text-primary"><a href="/trainings/all">All</a></li>
                    <li class="text-primary"><a href="jobs/employment/freelance.html">Freelance</a></li>
                    <li class="text-primary"><a href="jobs/employment/full-time.html">Full Time</a></li>
                    <li class="text-primary"><a href="jobs/employment/internship.html">Internship</a></li>
                    <li class="text-primary"><a href="jobs/employment/part-time.html">Part Time</a></li>
                    <li class="text-primary"><a href="jobs/employment/temporary.html">Temporary</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="cell-xs-4 cell-md-3 cell-sm-6 offset-top-50 offset-md-top-0 cell-md-push-3 text-left">
              <h6 class="text-uppercase text-spacing-60 font-default text-white">Quick Links</h6>
              <div class="reveal-block">
                <div class="reveal-inline-block">
                  <ul class="list list-unstyled list-inline-primary">
                    <li class="text-primary"><a href="/aboutus">About Us</a></li>
                    <li class="text-primary"><a href="/skills">Blog</a></li>
                    <li class="text-primary"><a href="/faq">FAQ</a></li>
                    <li class="text-primary"><a href="/contact">Contact Us</a></li>
                    <li class="text-primary"><a href="/privacy-policy">Privacy Policy</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          </div>
          <div class="range range-xs-center">
            <div class="cell-md-12 offset-top-50 offset-md-top-0 text-left">
              <ul class="list-inline list-inline-sm reveal-inline-block post-meta text-dark list-inline-primary pull-right" style="margin-top:8px;">
                <li><a href="#"><span class="fa fa-facebook fa-2x"></span></a></li>
                <li><a href="#"><span class="fa fa-twitter fa-2x"></span></a></li>
                <li><a href="#"><span class="fa fa-linkedin fa-2x"></span></a></li>
                <li><a href="#"><span class="fa fa-google-plus fa-2x"></span></a></li>
              </ul>
            </div>
          </div>
        </div>
        <p style="color:white; margin-left:300px; font-size:1.2em;" >© 2018 - All Rights with TYDInnovationIncubatordeveloper</p>

      </div>

  </footer>


    <!-- Scripts -->
    <script src="{{ asset('js/scripts.min.js')}}"></script>
  <script src="{{asset('js/main.js')}}"></script>
  <!--<script src="http://www.powerjob.in/js/toastr.min.js"></script>-->
  <script src="{{asset('js/sweetalert.min.js')}}"></script>
      <script>function subcategory(a){$.ajax({type:"GET",url:"http://www.powerjob.in/company/posts/category/"+a,success:function(a){$("#get_subcategory").html(a),$("#get_subcategory").
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
