<!DOCTYPE html>
<html lang="en" class="ltr" dir="ltr">

<!-- Mirrored from www.sharjeelanjum.com/demos/jobsportal/public/ by HTTrack Website Copier/3.x [XR&CO'2013], Wed, 31 Oct 2018 14:42:15 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jobs In Pakistan</title>
    <meta name="Description" content="Find best Jobs in Pakistan, jobs listings and job opportunities on ROZEE.PK. Browse more than 100K jobs in Pakistan and apply for free! ROZEE.PK is Pakistan's leading job website where more than 52K top companies are posting jobs">
    <meta name="Keywords" content="Jobs in Pakistan, Jobs Pakistan, Jobs, Careers, Recruitment, Employment, Hiring, Banking, CVs, Career, Finance, IT, Marketing, Online Jobs, Opportunity,Pakistan, Resume, Work, naukri, rizq, Rozi">
    <meta name="robots" content="ALL, FOLLOW,INDEX" />
    <meta name="author" content="JobPortal.PK" />

    <!-- Fav Icon -->
    <link rel="shortcut icon" href="favicon.ico">
    <!-- Owl carousel -->
    <link href="{!! url('css/owl.carousel.css') !!}" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="{!! url('css/bootstrap.min.css') !!}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{!! url('css/font-awesome.css') !!}" rel="stylesheet">
    <!-- Custom Style -->
    <link href="{!! url('css/main.css') !!}" rel="stylesheet">
    <link href="admin_assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
    <link href="admin_assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="admin_assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="http://www.sharjeelanjum.com/demos/jobsportal/public/js/html5shiv.min.js"></script>
    <script src="http://www.sharjeelanjum.com/demos/jobsportal/public/js/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<!-- Header start -->
  @include('includes.header')
<!-- Header end -->

@yield('content')


<!-- Testimonials start -->


<!-- Testimonials End -->

<!--Footer-->
@include('includes.footer')

<!-- Bootstrap's JavaScript -->
<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- Owl carousel -->
<script src="js/owl.carousel.js"></script>
<script src="admin_assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="admin_assets/global/plugins/Bootstrap-3-Typeahead/bootstrap3-typeahead.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<script src="admin_assets/global/plugins/select2/js/select2.full.min.js" type="text/javascript"></script>

<!-- Custom js -->
<script src="js/script.js"></script>
<script src="admin_assets/global/plugins/jquery.scrollTo.min.js" type="text/javascript"></script>
<script src="https://www.google.com/recaptcha/api.js?" async defer></script>


<script>
    $(document).ready(function ($) {
        $("form").submit(function () {
            $(this).find(":input").filter(function () {
                return !this.value;
            }).attr("disabled", "disabled");
            return true;
        });
        $("form").find(":input").prop("disabled", false);
    });
</script>

<script type="text/javascript">
    $(document).ready(function ($) {
        $('#country_id').on('change', function (e) {
            e.preventDefault();
            filterStates(0);
        });
        $(document).on('change', '#state_id', function (e) {
            e.preventDefault();
            filterCities(0);
        });

        filterStates(0);
    });

    function filterStates(state_id)
    {
        var country_id = $('#country_id').val();
        if (country_id != ''){
            $.post("filter-states-dropdown.html", {country_id: country_id, state_id: state_id, _method: 'POST', _token: 'EzR1TByaVQT5Vz5KxgVTrT1gSHdClJnTp38I3Ghe'})
                    .done(function (response) {
                        $('#state_dd').html(response);

                        filterCities(0);

                    });
        }
    }

    function filterCities(city_id)
    {
        var state_id = $('#state_id').val();
        if (state_id != ''){
            $.post("filter-cities-dropdown.html", {state_id: state_id, city_id: city_id, _method: 'POST', _token: 'EzR1TByaVQT5Vz5KxgVTrT1gSHdClJnTp38I3Ghe'})
                    .done(function (response) {
                        $('#city_dd').html(response);
                    });
        }
    }
</script>

<script type="text/JavaScript">
    $(document).ready(function(){
        $(document).scrollTo('.has-error', 2000);
    });
    function showProcessingForm(btn_id){
        $("#"+btn_id).val( 'Processing .....' );
        $("#"+btn_id).attr('disabled','disabled');
    }
</script>
</body>

<!-- Mirrored from www.sharjeelanjum.com/demos/jobsportal/public/ by HTTrack Website Copier/3.x [XR&CO'2013], Wed, 31 Oct 2018 14:44:27 GMT -->
</html>