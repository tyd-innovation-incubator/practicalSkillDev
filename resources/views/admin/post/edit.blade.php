@extends('layouts.admin.app')
@section('headSection')
<link rel="stylesheet" href="/css/admin/bower_components/select2/dist/css/select2.min.css">

@endsection
@section('main-content')

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


          <!-- form start -->
          <form role="form" action="{{ route('post.update',$post->id)}}" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  {{ method_field('PUT') }}


            <div class="box-body">
      <div class="col-md-6">
        <div class="form-group">
          <label for="title">Post Title</label>
          <input type="text" class="form-control" id="title" name="title" placeholder="Enter PostTitle" value="{{$post->Title}}">
        </div>
        <div class="form-group">
          <label for="subtitle">Post SubTitle</label>
          <input type="text" class="form-control" id="subtitle"  name="subtitle" placeholder="Enter Post SubTitle" value="{{$post->subtitle}}">
        </div>
        <div class="form-group">
          <label for="slug">Slug</label>
          <input type="text" class="form-control" id="slug" placeholder="Slug" name="slug" value="{{$post->slug}}">
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
      <input type="checkbox" name="status" value="1" @if ($post->status == 1) {{'checked'}} @endif> Publish
    </label>
  </div>
</div>
<br>

               <div class="form-group">
                        <label>Select Tags</label>
                        <select class="form-control select2" multiple="multiple" data-placeholder="Select a State"
                                style="width: 100%;" name="tags[]">

                                 @foreach ($tags as $tag)
                                 <option value="{{($tag->id)}}"
                                    @foreach ($post->tags as $postTag)
                                    @if ($postTag->id == $tag->id)
                                    selected
                                    @endif
                                    @endforeach

                                   >{{($tag->name)}}</option>

                               @endforeach

                        </select>
                      </div>

                      <div class="form-group">
                              <label>Select Category</label>
                              <select class="form-control select2" multiple="multiple" data-placeholder="Select a State"
                                      style="width: 100%;" name="categories[]">
                                      @foreach ($categories as $category)
                                      <option value="{{($category->id)}}"

                                        @foreach ($post->categories as $postCategory)
                                        @if ($postCategory->id == $category->id)
                                        selected
                                        @endif
                                        @endforeach
>{{($category->name)}}</option>

                                    @endforeach
                              </select>
                            </div>
              </div>

            </div>


            <!-- /.box-body -->

            <div class="box">
              <div class="box-header">
                  <h3 class="box-title">TEXT BODY
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

                  <textarea  id="editor1"
                            style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" name="body" value="" >{{$post->body}}</textarea>

              </div>
            </div>


            <div class="form-group col-lg-offset-4"   >
              <button type="submit" class="btn btn-success"  style="margin-bottom:20px;">UPDATE POST</button>
            </div>
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
