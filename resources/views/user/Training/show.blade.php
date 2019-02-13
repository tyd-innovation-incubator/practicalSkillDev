@extends('layouts.app')
@section('headSection')
<link rel="stylesheet" href="/css/admin/bower_components/select2/dist/css/select2.min.css">
@endsection
@section('content')
<div class="context-dark">

		<section class="breadcrumb-modern rd-parallax bg-gray-darkest">

			<div data-speed="0.2" data-type="media" data-url="http://www.powerjob.in/images/background-02-1920x870.jpg" class="rd-parallax-layer"></div>

			<div data-speed="0" data-type="html" class="rd-parallax-layer">

				<div class="bg-overlay-gray-darkest">

					<div class="shell section-top-98 section-bottom-34 section-md-bottom-66 section-md-98 section-lg-top-155 section-lg-bottom-66">

						<div class="text-extra-big text-bold veil reveal-md-block">   <h3 class="box-title">CREATE Training</h3>
</div>

					</div>

				</div>

			</div>

		</section>

	</div>


<div class="content-wrapper" style="margin-top:20px;margin-bottom:20px;">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
          <div class="box-header with-border">
            <a class=" btn btn-success" href="{{route('Traininglist.index')}}">SHOW Vacancies</a>

          </div>
          <!-- /.box-header -->
        </div>
      </div>
    </div>

<container style="width:70%;">
	<div class="row">
	  @if(count($errors)>0)

	  @foreach($errors->all() as $error)

	  <p class="alert alert-danger">{{$error}}</p>

	  @endforeach
	  @endif

	  <div class="col-md-6">
	    <!-- form start -->
	    <form role="form" action="{{ route('Traininglist.store')}}" method="post">
	            {{ csrf_field() }}

	      <div class="box-body">
	  <div class="form-group">
	    <label for="title">Training Title</label>
	    <input type="text" class="form-control" id="title" name="title" placeholder="Enter Training Title">
	  </div>
	  <div class="form-group">
	    <label for="subtitle">Training SubTitle</label>
	    <input type="text" class="form-control" id="subtitle"  name="subtitle" placeholder="Enter Training SubTitle">
	  </div>
		<div class="form-group">
	    <label for="company_name">Company Name</label>
	    <input type="text" class="form-control" id="company_name"  name="company_name" placeholder="Enter Company Name">
	  </div>
	  <div class="form-group">
	    <label for="location">Training location</label>
	    <input type="text" class="form-control" id="location"  name="location" placeholder="Enter Location">
	  </div>
	  <div class="form-group">
	    <label for="Employment_type">Training Employment_type</label>
	    <input type="text" class="form-control" id="Employment_type"  name="Employment_type" placeholder="Enter Employment Type">
	  </div>
	  <div class="form-group">
	    <label for="phone">Training Phone</label>
	    <input type="tel" class="form-control" id="phone"  name="phone" placeholder="Enter Phone">
	  </div>
	  <div class="form-group">
	    <label for="salary">salary</label>
	    <input type="text" class="form-control" id="salary" placeholder="salary" name="salary" >
	  </div>
	  <div class="form-group">
	    <label for="Number_of_vacancy">Number of vacancy</label>
	    <input type="number" class="form-control" id="Number_of_vacancy" placeholder="Number_of_vacancy" name="Number_of_vacancy" >
	  </div>
	</div>

	  </div>



	              <div class="col-md-6">
	  <div class="row">
	  <div class="form-group pull-right">
	  <label for="image">Image</label>
	  <input type="file" id="image" name="image">

	  </div>
	  <div class="checkbox pull-left" style="margin-left:50px;">
	  <label>
	  <input type="checkbox" name="status" value="1" > Publish
	  </label>
	  </div>
	  </div>
	  <br>

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
	              <div class="form-group col-lg-offset-4">
	                <button type="submit" class="btn btn-success"  style="margin-bottom:20px;">SUBMIT POST</button>
	              </div>
	            </form>

	         </div>
	</div>


</container>

 </div>

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
