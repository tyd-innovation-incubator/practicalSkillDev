<!-- Header -->
<header class="header">
    <div class="container clearfix">
        <div class="header-inner flex space-between items-center">
            <div class="left">
                <div class="logo"><a href="/"><img src="/image/LogoMakr_4WXAYZ.png"  style="width:300px;"alt="JobPress" class="img-responsive"></a></div>
            </div> <!-- end .left -->
            <div class="right flex space-between no-column items-center">
                @if (Auth::guest())
                    <div class="navigation">
                        <nav class="main-nav">
                            <ul class="list-unstyled">
                                <li class="active"><a href="/">Home</a></li>
                                <li><a href="/about">About</a></li>
                                <li >
                                    <a href="/posts">Soft Skill</a>

                                </li>
                                <li class="menu-item-has-children">
                                    <a href="candidates-listing.html">Candidates</a>
                                    <ul>
                                        <li><a href="/Traininglist">Training Listing</a></li>
                                        <li><a href="/postresume">Post a Resume</a></li>
                                        <li><a href="/dashboard">Candidate Dashboard</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="companies-listing.html">Companies</a>
                                    <ul>
                                        <li><a href="/companies-list">Browse Companies</a></li>
                                        <li><a href="/Traininglist/create">Post a job</a></li>
                                        <li><a href="/EmployerDashboard">Employer Dashboard</a></li>
                                    </ul>
                                </li>

                                <li class="menu-item-has-children">
                                    <a href="#0">Pages</a>
                                    <ul>
                                        <li><a href="/Help">Help Tabs</a></li>
                                        <li><a href="/contact">Contact Us</a></li>
                                        <li><a href="/pricingplan">Pricing plans</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav> <!-- end .main-nav -->
                        <a href="#" class="responsive-menu-open"><i class="ion-navicon"></i></a>
                    </div> <!-- end .navigation -->
                    <div class="button-group-merged flex no-column">
                        <a href="/Traininglist/create" class="button">Post a Job</a>
                        <a href="/register" class="button" >Sign Up</a>
                        @else
                            <div class="navigation">
                                <nav class="main-nav">
                                    <ul class="list-unstyled">
                                        <li class="active"><a href="/">Home</a></li>
                                        <li><a href="/about">About</a></li>
                                        <li >
                                            <a href="/posts">Soft Skill</a>

                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="candidates-listing.html">Candidates</a>
                                            <ul>
                                                <li><a href="/Traininglist">Training Listing</a></li>
                                                <li><a href="/postresume">Post a Resume</a></li>
                                                <li><a href="/dashboard">Candidate Dashboard</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="companies-listing.html">Companies</a>
                                            <ul>
                                                <li><a href="/companies-list">Browse Companies</a></li>
                                                <li><a href="/Traininglist/create">Post a job</a></li>
                                                <li><a href="/EmployerDashboard">Employer Dashboard</a></li>
                                            </ul>
                                        </li>

                                        <li class="menu-item-has-children">
                                            <a href="#0">Pages</a>
                                            <ul>
                                                <li><a href="/Help">Help Tabs</a></li>
                                                <li><a href="/contact">Contact Us</a></li>
                                                <li><a href="/pricingplan">Pricing plans</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav> <!-- end .main-nav -->
                                <a href="#" class="responsive-menu-open"><i class="ion-navicon"></i></a>
                            </div> <!-- end .navigation -->
                            <div class="button-group-merged flex no-column">

                                <div class="account-info-top flex items-center no-column">
                                    <a href="#0" class="notification-icon"><i class="ion-android-notifications"></i></a>
                                    <a href="/dashboard" class="profile-button flex space-between items-center no-column no-wrap"><span>Hi!</span>{{ Auth::user()->name }}<img src="image/avatar01.jpg" alt="avatar" class="img-responsive"></a>
                                </div> <!-- end .account-info-top -->

                                @endif

                            </div> <!-- end .button-group-merged -->
                    </div> <!-- end .right -->
            </div> <!-- end .header-inner -->
        </div>
        </div><!-- end .container -->
</header> <!-- end .header -->


<!-- Responsive Menu -->
<div class="responsive-menu">
    <a href="#" class="responsive-menu-close"><i class="ion-android-close"></i></a>
    <nav class="responsive-nav"></nav> <!-- end .responsive-nav -->
</div> <!-- end .responsive-menu -->