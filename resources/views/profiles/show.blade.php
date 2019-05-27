@extends('layouts.main')

@section('template_title')
	{{ $user->name }}'s Profile
@endsection

@section('template_fastload_css')

	#map-canvas{
		min-height: 300px;
		height: 100%;
		width: 100%;
	}

@endsection

@section('content')

	<div class="row" style="margin-left: 40px; margin-top: 20px">


		{{--@include('includes.components.left_sidebar')--}}


		<div class="col-md-11">

			<div class="row" style="margin-top: 20px">
				<div class="col-sm-3"><!--left col-->


					<div class="text-center">
						<img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="avatar img-circle img-thumbnail" alt="avatar">
						<h6>Upload a different photo...</h6>
						<input type="file" class="text-center center-block file-upload">
					</div>
					</hr>
					<br>


					<div class="panel panel-default">
						<div class="panel-heading">Website <i class="fa fa-link fa-1x"></i></div>
						<div class="panel-body"><a href="http://bootnipets.com">bootnipets.com</a></div>
					</div>


					<ul class="list-group">
						<li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
						<li class="list-group-item text-right"><span class="pull-left"><strong>Shares</strong></span> 125</li>
						<li class="list-group-item text-right"><span class="pull-left"><strong>Likes</strong></span> 13</li>
						<li class="list-group-item text-right"><span class="pull-left"><strong>Posts</strong></span> 37</li>
						<li class="list-group-item text-right"><span class="pull-left"><strong>Portfolio</strong></span> 37</li>

						<li class="list-group-item text-right"><span class="pull-left"><strong>Followers</strong></span> 78</li>
					</ul>

					<div class="panel panel-default">
						<div class="panel-heading">Social Media</div>
						<div class="panel-body">
							<i class="fa fa-facebook fa-2x"></i> <i class="fa fa-github fa-2x"></i> <i class="fa fa-twitter fa-2x"></i> <i class="fa fa-pinterest fa-2x"></i> <i class="fa fa-google-plus fa-2x"></i>
						</div>
					</div>

				</div><!--/col-3-->
				<div class="col-sm-9" style="margin-top: 20px">
					<div class="row">
						<div class="col-md-6">

							<h1>{!! $user->first_name !!} {!! $user->last_name !!}</h1>
							<h2>system developer</h2>
							<h3>Tanzania</h3>
						</div>
						<div class="col-md-6">

							<a href="{!! route('profile.edit',$user->name) !!}" style=" ">
								<img class="pull-right" style="margin-top: 120px" src="https://img.icons8.com/ultraviolet/40/000000/edit.png">
							</a>

						</div>
					</div>
					<hr>

					<div class="panel panel-default">
						<div class="panel-body">
							<div class="panel-heading">
								<h4>Education Level</h4>
							</div>

							<a href="{!! route('profile.education_details',$user->id) !!}" style=" ">
								<img class="pull-right" style="margin-top: 0px" src="https://img.icons8.com/ultraviolet/40/000000/edit.png">
							</a>
						</div>
					</div>

					<div class="panel panel-default">
						<div class="panel-body">
							<div class="panel-heading">
								<h4>Skills</h4>
							</div>

							<a href="{!! route('profile.edit',$user->name) !!}" style=" ">
								<img class="pull-right" style="margin-top: 0px" src="https://img.icons8.com/ultraviolet/40/000000/edit.png">
							</a>
						</div>
					</div>

					<div class="panel panel-default">
						<div class="panel-body">
							<div class="panel-heading">
								<h4>Project and Portifolio</h4>
							</div>

							<a href="{!! route('profile.edit',$user->name) !!}" style=" ">
								<img class="pull-right" style="margin-top: 0px" src="https://img.icons8.com/ultraviolet/40/000000/edit.png">
							</a>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-body">
							<div class="panel-heading">
								<h4>Language Skills</h4>
							</div>

							<a href="" style=" ">
								<img class="pull-right" style="margin-top: 0px" src="https://img.icons8.com/ultraviolet/40/000000/edit.png">
							</a>
						</div>
					</div>


				</div><!--/tab-content-->

			</div>
		</div>


		{{--@include('includes.components.right_sidebar')--}}

	</div>
@endsection

@section('footer_scripts')

	@if(config('settings.googleMapsAPIStatus'))
		@include('scripts.google-maps-geocode-and-map')
	@endif

@endsection
