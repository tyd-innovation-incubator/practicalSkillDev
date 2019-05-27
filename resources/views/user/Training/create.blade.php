@extends('layouts.app')
@section('headSection')
<link rel="stylesheet" href="/css/admin/bower_components/select2/dist/css/select2.min.css">
@endsection
@section('content')

<!-- Post Job Section -->
<div class="section job-post-form-section solid-light-grey-bg">
  <div class="inner">
    <div class="container">
			<div class="box-header with-border">
				<a class=" btn btn-success" href="{{route('Traininglist.index')}}">SHOW Vacancies</a>

			</div>
			@if(count($errors)>0)

			@foreach($errors->all() as $error)

			<p class="alert alert-danger">{{$error}}</p>

			@endforeach
			@endif
			<form role="form" action="{{ route('Traininglist.store')}}" method="post">
	            {{ csrf_field() }}
							<div class="box-body">
							<div class="row">
				<div class="col-sm-4">
					<div class="form-group">
						<label for="title">Training Title</label>
						<input type="text" class="form-control" id="title" name="title" placeholder="Enter Training Title">
					</div>
				</div>
				<div class="col-sm-4">
				  <div class="form-group">
				 	 <label for="subtitle">Training SubTitle</label>
				 	 <input type="text" class="form-control" id="subtitle"  name="subtitle" placeholder="Enter Training SubTitle">
				  </div>
				</div>
							</div>
							<div class="row">
				<div class="col-sm-4">
					<div class="form-group">
						<label for="company_name">Company Name</label>
						<input type="text" class="form-control" id="company_name"  name="company_name" placeholder="Enter Company Name">
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
					 <label for="location">Training location</label>
					 <input type="text" class="form-control" id="location"  name="location" placeholder="Enter Location">
				 </div>
				</div>
							</div>
							<div class="row">
				<div class="col-sm-4">
					<div class="form-group">
				    <label for="Employment_type">Training Employment_type</label>
				    <input type="text" class="form-control" id="Employment_type"  name="Employment_type" placeholder="Enter Employment Type">
				  </div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
				    <label for="phone">Training Phone</label>
				    <input type="tel" class="form-control" id="phone"  name="phone" placeholder="Enter Phone">
				  </div>
				</div>
							</div>
							<div class="row">
				<div class="col-sm-4">
					<div class="form-group">
				    <label for="Number_of_vacancy">Number of vacancy</label>
				    <input type="number" class="form-control" id="Number_of_vacancy" placeholder="Number_of_vacancy" name="Number_of_vacancy" >
				  </div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<label for="salary">salary</label>
						<input type="text" class="form-control" id="salary" placeholder="salary" name="salary" >
					</div>
				</div>
							</div>
							<div class="row">
				<div class="col-sm-4">
					<div class="form-group pull-right">
				  <label for="image">Image</label>
				  <input type="file" id="image" name="image">

				  </div>
				</div>
				<div class="col-sm-4">
					<div class="checkbox pull-left" style="margin-left:50px;">
				  <label>
				  <input type="checkbox" name="status" value="1" > Publish
				  </label>
				  </div>
				</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="box">
										<div class="box-header">
												<h3 class="box-title">Description
												<small>Simple and fast</small>
											</h3>
											<!-- tools box -->
											<div class="pull-right box-tools">
												<button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip"
																title="Collapse">
													<i class="fa fa-minus"></i></button>
											</div>
											<!-- /. tools -->
										</div>
										<!-- /.box-header -->
										<div class="box-body pad">

												<textarea style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="Description"  id="editor1"></textarea>

										</div>
									</div>
								</div>
							</div>
	</div>

	  </div>



	  <br>
	              <div class="form-group col-lg-offset-4">
	                <button type="submit" class="btn btn-success"  style="margin-bottom:20px;">SUBMIT POST</button>
	              </div>
	            </form>


    </div> <!-- end .container -->
  </div> <!-- end .inner -->
</div> <!-- end .section -->


@endsection
@section('footerSection')
<script src="{{ asset('/css/admin/bower_components/select2/dist/js/select2.full.min.js')}}" charset="utf-8"></script>
<script src="{{asset('css/admin/bower_components/ckeditor/ckeditor.js')}}"></script>

<script type="text/javascript">
  $(document).ready(function(){
    $('.select2').select2();

  });

  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  });
</script>


@endsection
