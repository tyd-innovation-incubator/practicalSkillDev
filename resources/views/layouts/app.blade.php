<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/practicalSkillDev.css')}}" rel="stylesheet">


</head>
<body>
    <div id="app">
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Brand</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav" style="margin-left:70px;">
              <li class="active"  style="margin-left:30px;"><a href="/">Home<span class="sr-only">(current)</span></a></li>
              <li  style="margin-left:30px;"><a href="/skills">Skills/Tips</a></li>
              <li  style="margin-left:30px;"><a href="#">Skills</a></li>
              <li class="dropdown"  style="margin-left:30px;">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categories<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Fiels</a></li>
                  <li><a href="#">Intership</a></li>
                  <li><a href="#">Jobs</a></li>
                </ul>
              </li>
            </ul>
            <form class="navbar-form navbar-left"  style="margin-left:50px;">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Search">
              </div>
              <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
            </form>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="#">Link</a></li>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @else
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
                    @endif
                </ul>
              </li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>

        @yield('content')
    </div>

    <footer>
      <div class="container">
          <div class="row">
              <div class="col-md-4 col-sm-6 footer-col">
                  <div class="logofooter">Practical Skill Development</div>
                  <p></p>
                  <p><i class="fa fa-map-pin"></i> P.O. Box 55132, Dar es Salaam, Tanzania</p>
                  <p><i class="fa fa-phone"></i> Phone (Tanzania) : +255 713-518549</p>
                  <p><i class="fa fa-envelope"></i> E-mail : gchami@techniks.co.tz</p>

              </div>
              <div class="col-md-4 col-sm-6 footer-col">
                  <h6 class="heading7">About PracticalSkillDevelopment</h6>
                  <ul class="footer-ul">
                  <li><a href="/aboutus">How it works?</a></li>
                  <li><a href="/contact">Team </a></li>
                  <li><a href="/contact">Contact us</a></li>
                   <li><a href="/contact">FaQ</a></li>

                  </ul>
              </div>

              <div class="col-md-4 col-sm-6 footer-col">
                  <h6 class="heading7">Social Media</h6>
                  <ul class="footer-social">
                      <li><i class="fa fa-linkedin social-icon linked-in" aria-hidden="true"></i>Linkedin</li>
                      <li><i class="fa fa-facebook social-icon facebook" aria-hidden="true"></i>Facebook</li>
                      <li><i class="fa fa-twitter social-icon twitter" aria-hidden="true"></i>Twitter</li>
                      <li><i class="fa fa-google-plus social-icon google" aria-hidden="true"></i>Google+</li>
                  </ul>
              </div>
          </div>
      </div>
  </footer>
  <div class="copyright">
      <div class="container">
              <p >© 2018 - All Rights with TYDInnovationIncubatordeveloper</p>
      </div>
  </div>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
       <script src="{{ asset('js/jquery.js') }}"></script>

   <script src="{{ asset('js/bootstrap.min.js') }}"></script>

   <script src="{{ asset('js/practicalSkillsDev.js') }}"></script>
</body>
</html>
