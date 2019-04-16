<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from jobpress.icookcode.net/dev/ by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 04 Oct 2018 15:27:29 GMT -->
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JobPress HTML template</title>

    <!-- CSS -->
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Ionicons -->
    <link href="fonts/ionicons/css/ionicons.min.css" rel="stylesheet">
    <!-- Owl Carousel -->
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.default.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="css/animate.min.css" rel="stylesheet">
    <!--Magnific Popup -->
    <link href="css/magnific-popup.css" rel="stylesheet">
    <!--Tagsinput CSS -->
    <link href="css/tagsinput.css" rel="stylesheet">
    <!-- Style.css -->
    <link href="css/style.css" rel="stylesheet">

  </head>
  <body>

    <!-- Header -->
 @include('includes.components.header')

    <!-- Responsive Menu -->
    <div class="responsive-menu">
      <a href="#" class="responsive-menu-close"><i class="ion-android-close"></i></a>
      <nav class="responsive-nav"></nav> <!-- end .responsive-nav -->
    </div> <!-- end .responsive-menu -->

  @include('includes.components.modals')

    <!-- Hero Section -->
  @include('includes.components.hero_section')



    <!-- Latest Jobs Section -->
@include('includes.components.latest_job')

    <div class="section cta-section parallax text-center" style="background-image: url('images/background02.jpg');">
      <div class="inner">
        <div class="container">
          <h2>Looking for a job</h2>
          <p class="large light">Join thousand of emplyers and earn what you deserve</p>
          <div class="cta-button">
            <a href="post-resume-form.html" class="button">Get started now</a>
          </div> <!-- end .cta-button -->
        </div> <!-- end .container -->
      </div> <!-- end .inner -->
    </div> <!-- end .section -->

    <!-- Latest News Section -->
@include('includes.components.latest_news')

    <!-- Clients Section -->
  @include('includes.components.partners')

    <!-- CTA App Section -->


    <!-- Footer -->
  @include('includes.components.footer')


    <!-- Scripts -->
    <!-- jQuery -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <!-- Bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- google maps -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAy-PboZ3O_A25CcJ9eoiSrKokTnWyAmt8"></script>
    <!-- Owl Carousel -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- Wow.js -->
    <script src="js/wow.min.js"></script>
    <!-- Typehead.js -->
    <script src="js/typehead.js"></script>
    <!-- Tagsinput.js -->
    <script src="js/tagsinput.js"></script>
    <!-- Bootstrap Select -->
    <script src="js/bootstrap-select.js"></script>
    <!-- Waypoints -->
    <script src="js/jquery.waypoints.min.js"></script>
    <!-- CountTo -->
    <script src="js/jquery.countTo.js"></script>
    <!-- Isotope -->
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <!-- Magnific-Popup -->
    <script src="js/jquery.magnific-popup.js"></script>
    <!-- Scripts.js -->
    <script src="js/scripts.js"></script>



  </body>

<!-- Mirrored from jobpress.icookcode.net/dev/ by HTTrack Website Copier/3.x [XR&CO'2013], Thu, 04 Oct 2018 15:28:29 GMT -->
</html>
