<div class="header" xmlns="http://www.w3.org/1999/html">
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-sm-3 col-xs-12"> <a href="{!! route('welcome') !!}" class="logo">
                    <img src="images/LOGO.png" alt="" /></a>
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="col-md-10 col-sm-12 col-xs-12">

                <!-- Nav start -->

                <div class="navbar navbar-default" role="navigation">
                    <div class="navbar-collapse collapse" id="nav-main">
                        <ul class="nav navbar-nav">
                            @guest
                            <li class="active"><a href="{!! route('welcome') !!}">Home</a> </li>
                                <li class=""><a href="cms/about-us.html">Candidates</a> </li>

                            <li class=""><a href="cms/about-us.html">Companies</a> </li>
                            <li class=""><a href="cms/about-us.html">Soft Skills</a> </li>
                            <li class="dropdown"><a href="contact-us.html">Resources<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li class=""><a href="cms/about-us.html">About us</a> </li>
                                    <li class=""><a href="cms/about-us.html">Contact Us</a> </li>
                                </ul>
                            </li>

                            @else

                            <li class="active"><a href="{!! route('welcome') !!}">Home</a> </li>
                            {{--@if($user->user_account == 3)--}}
                            <li class=""><a href="cms/about-us.html">Candidates</a> </li>
                            {{--@else--}}

                                {{--@endif--}}
                            <li class=""><a href="cms/about-us.html">Companies</a> </li>
                            <li class=""><a href="cms/about-us.html">Soft Skills</a> </li>
                            <li class="dropdown"><a href="contact-us.html">Resources<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li class=""><a href="cms/about-us.html">About us</a> </li>
                                <li class=""><a href="cms/about-us.html">Contact Us</a> </li>
                            </ul>
                            </li>
                                                        @endguest




                                @guest
                            <li class="dropdown"><a href="login.html">Sign in <span class="caret"></span></a>

                                <!-- dropdown start -->

                                    <ul  class="dropdown-menu">
                                        <li><a href="{!! route('login') !!}">Sign in</a> </li>
                                        <li><a href="{!! route('register') !!}">Register</a> </li>
                                        <li><a href="password/reset.html">Forgot Password?</a> </li>
                                        </ul>
                                        </li>
                                        @else


                                            <li class="dropdown" >

                                                <a  href="#">
                                                    @if ((Auth::User()->profile) && Auth::user()->profile->avatar_status == 1)
                                                        <img src="{{ Auth::user()->profile->avatar }}" alt="{{ Auth::user()->name }}" class="user-avatar-nav">
                                                    @else
                                                        <div class="user-avatar-nav"></div>
                                                    @endif
                                                    {{ Auth::user()->name }} <span class="caret"></span>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class=" {{ Request::is('profile/'.Auth::user()->name, 'profile/'.Auth::user()->name . '/edit') ? 'active' : null }}" href="{{ url('/profile/'.Auth::user()->name) }}">
                                                            {!! trans('titles.profile') !!}
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                                           onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                                            {{ __('Logout') }}
                                                        </a></li>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        @csrf
                                                    </form>
                                                </ul>

                                            </li>


                                            @endguest

                                    </ul>

                                </div><!-- avatar -->


                        <!-- Nav collapes end -->

                    </div>
                    <div class="clearfix"></div>
                </div>

                <!-- Nav end -->

            </div>
        </div>

        <!-- row end -->

    </div>

    <!-- Header container end -->

</div>