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
    <link href="css/bootstrap.min.css" rel="stylesheet">
    		<!-- Ionicons -->

        <link href="{{ asset('plugins/css/plugins.css')}}" rel="stylesheet">

    		<link href="{{ asset('fonts/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
    		<!-- Owl Carousel -->
    		<link href="css/owl.carousel.css" rel="stylesheet">
    		<link href="css/owl.theme.default.css" rel="stylesheet">
    		<!-- Animate.css -->
    		<link href="{{ asset('css/animate.min.css')}}" rel="stylesheet">
    		<!--Magnific Popup -->
    		<link href="{{ asset('css/magnific-popup.css')}}" rel="stylesheet">
    		<!--Tagsinput CSS -->
    		<link href="{{ asset('css/tagsinput.css')}}" rel="stylesheet">
    		<!-- Style.css -->
    		<link href="{{ asset('css/newstyle.css')}}" rel="stylesheet">

    <link href="{{ asset('css/bio.css') }}" rel="stylesheet">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


    <link href="{{ asset('css/materialdesignicons.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sweetalert.css') }}" rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('/css/admin/bower_components/font-awesome/css/font-awesome.min.css')}}">

    <link rel="stylesheet" href="{{ asset('/css/admin/bower_components/bootstrap/dist/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{ asset('/css/admin/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">

    @section('headSection')

      @show
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="{{ asset('js/bio.js') }}"></script>

<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<style media="screen">
  .dashboard li{
    display:block;
  },
  .panel-title{

  }
</style>

<script>
$(document).ready(

    function iniciar(){
    $('.follow').on("click", function(){
        $('.follow').css('background-color','#34CF7A');
        $('.follow').html('<div class="icon-ok"></div> Following');
    });
    }

);
</script>

</head>
<body>



    @include('includes.components.header')



      @yield('content')

</div>
<!--
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
-->
@include('includes.components.footer')
    <!-- Scripts -->
    @section('footerSection')

      @show
      <!-- Scripts -->
      <!-- jQuery -->
      <script src="{{ asset('js/jquery-3.1.1.min.js')}}"></script>
      <!-- Bootstrap -->
      <script src="{{ asset('js/bootstrap.min.js')}}"></script>
      <!-- google maps -->
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAy-PboZ3O_A25CcJ9eoiSrKokTnWyAmt8"></script>
      <!-- Owl Carousel -->
      <script src="{{ asset('js/owl.carousel.min.js')}}"></script>
      <!-- Wow.js -->
      <script src="{{ asset('js/wow.min.js')}}"></script>
      <!-- Typehead.js -->
      <script src="{{ asset('js/typehead.js')}}"></script>
      <!-- Tagsinput.js -->
      <script src="{{ asset('js/tagsinput.js')}}"></script>
      <!-- Bootstrap Select -->
      <script src="{{ asset('js/bootstrap-select.js')}}"></script>
      <!-- Waypoints -->
      <script src="{{ asset('js/jquery.waypoints.min.js')}}"></script>
      <!-- CountTo -->
      <script src="{{ asset('js/jquery.countTo.js')}}"></script>
      <!-- Isotope -->
      <script src="{{ asset('js/isotope.pkgd.min.js')}}"></script>
      <script src="{{ asset('js/imagesloaded.pkgd.min.js')}}"></script>
      <!-- Magnific-Popup -->
      <script src="{{ asset('js/jquery.magnific-popup.js')}}"></script>
      <!-- Scripts.js -->
      <script src="{{ asset('js/scripts.js')}}"></script>


    <script src="{{ asset('js/scripts.min.js')}}"></script>
  <script src="{{asset('js/main.js')}}"></script>
  <!--<script src="http://www.powerjob.in/js/toastr.min.js"></script>-->
  <script src="{{asset('js/sweetalert.min.js')}}"></script>
      <script>function subcategory(a){$.ajax({type:"GET",url:"http://www.powerjob.in/company/posts/category/"+a,success:function(a){$("#get_subcategory").html(a),$("#get_subcategory").
    <script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
