<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin PRASDEL | Dashboard</title>



  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="stylesheet" href="{{ asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
  <link rel="stylesheet" href="{{ asset('/css/admin/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('/css/admin/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- Font Awesome -->
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('/css/admin/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('/css/admin/dist/css/AdminLTE.min.css')}}">
  <link rel="stylesheet" href="{{ asset('/css/admin/bower_components/morris.js/morris.css')}}">
<link rel="stylesheet" href="{{ asset('/css/admin/dist/css/skins/_all-skins.min.css')}}">
<link rel="stylesheet" href="{{ asset('/css/admin/bower_components/jvectormap/jquery-jvectormap.css')}}">
  <link rel="stylesheet" href="{{ asset('/css/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
  <link rel="stylesheet" href="{{ asset('/css/admin/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
@section('headSection')

  @show
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
@include('layouts.admin.header')

  <!-- Left side column. contains the logo and sidebar -->
  @include('layouts.admin.sidebar')
  <!-- Content Wrapper. Contains page content -->
  @section('main-content')


  @show
  <!-- /.content-wrapper -->
@include('layouts.admin.footer')

  <div class="control-sidebar-bg"></div>
</div>
<script src="{{ asset('/css/admin/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- ./wrapper -->
<script src="{{ asset('/css/admin/bower_components/jquery-ui/jquery-ui.min.js')}}"></script>

<!-- jQuery 3 -->
<!-- jQuery UI 1.11.4 -->
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

<script src="{{ asset('/css/admin/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
  <script src="{{ asset('/css/admin/bower_components/raphael/raphael.min.js')}}"></script>
  <script src="{{ asset('/css/admin/bower_components/morris.js/morris.min.js')}}"></script>


<script src="{{ asset('/css/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{ asset('/css/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<script src="{{ asset('/css/admin/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')}}"></script>
<!-- jQuery Knob Chart -->
<!-- daterangepicker -->
<!-- datepicker -->
<script src="{{ asset('/css/admin/bower_components/jquery-knob/dist/jquery.knob.min.js')}}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ asset('/css/admin/bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{ asset('/css/admin/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<script src="{{ asset('/css/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<script src="{{ asset('/css/admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>

<script src="{{ asset('/css/admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{ asset('/css/admin/dist/js/adminlte.min.js')}}"></script>
<script src="{{ asset('/css/admin/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- <script src="{{ asset('/css/admin/dist/js/pages/dashboard.js')}}"></script> -->

<!-- AdminLTE for demo purposes -->
<script src="{{ asset('/css/admin/dist/js/demo.js')}}"></script>
@section('footerSection')

  @show
</body>
</html>
