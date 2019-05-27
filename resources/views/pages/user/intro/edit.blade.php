@extends('layouts.app')

@section('content')

<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">EDIT PRASDEL</h3>
            <a class="col-lg-offset-5 btn btn-success" href="{{route('post.index')}}">SHOW POSTS</a>

          </div>
          <!-- /.box-header -->

@if(count($errors)>0)

@foreach($errors->all() as $error)

<p class="alert alert-danger">{{$error}}</p>

@endforeach
@endif

<form role="form" method="post" id="reused_form" action="{{route('intro.store')}}" >

  {{ csrf_field() }}
<div class="row">
<div class="col-md-6">

    <div class="form-group">
        <label for="name">
            FirstName:</label>
        <input type="text" class="form-control"
        id="name" name="firstname"   required maxlength="50">

    </div>
</div>
<div class="col-md-6">

    <div class="form-group">
        <label for="name">
            LastName:</label>
        <input type="text" class="form-control"
        id="name" name="lastname"   required maxlength="50">
    </div>
</div>

</div>
<div class="form-group">
<label for="email">
Headline:</label>
<input type="email" class="form-control"
id="email" name="email" required maxlength="50">
</div>
<div class="form-group">
    <label for="email">
        Current Position:</label>
    <input type="email" class="form-control"
    id="email" name="email" required maxlength="50">
</div>
<div class="form-group">
    <label for="email">
      Education:</label>
    <input type="email" class="form-control"
    id="email" name="email" required maxlength="50">
</div>
<div class="row">
  <div class="col-md-6">

                      <div class="form-group">
                          <label for="name">
                            Country/Region:</label>
                          <input type="text" class="form-control"
                          id="name" name="firstname"   required maxlength="50">

                      </div>
  </div>
  <div class="col-md-6">

                      <div class="form-group">
                          <label for="name">
                          Zip code:</label>
                          <input type="text" class="form-control"
                          id="name" name="lastname"   required maxlength="50">
                      </div>
  </div>

</div>
<div class="form-group">
    <label for="name">
        Summary:</label>
    <textarea class="form-control" type="textarea" name="message"
    id="message" placeholder="Your summary here"
    maxlength="6000" rows="7"></textarea>
</div>

<button type="submit" class="btn btn-lg btn-success btn-block" id="btnContactUs">Post It! →</button>

</form>



       </div>

       <!-- /.col-->

          </div>
     </div>


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
