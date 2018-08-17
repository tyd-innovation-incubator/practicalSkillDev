@extends('layouts.admin.app')

@section('main-content')
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Tag</h3>
            <a class="col-lg-offset-5 btn btn-success" href="{{route('tag.index')}}">SHOW TAGS</a>

          </div>


          @if(count($errors)>0)
          @foreach($errors->all() as $error)
          <p class="alert alert-danger">{{$error}}</p>
          @endforeach
          @endif

          <!-- form start -->
          <form role="form"  action="{{ route('tag.store')}}" method="post">
                     {{ csrf_field() }}

            <div class="box-body">
      <div class="col-md-6">
        <div class="form-group">
          <label for="name">Tag Name</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Enter Tag Name">
        </div>
        <div class="form-group">
          <label for="slug">Slug</label>
          <input type="text" class="form-control" id="slug" placeholder="Slug" name="slug">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>

            </div>
          </form>

       </div>
       <!-- /.col-->

          </div>
     </div>


 </div>

@endsection
