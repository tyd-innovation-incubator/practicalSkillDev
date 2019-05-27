@extends('layouts.admin.app')

@section('main-content')
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Permission</h3>
            <a class="col-lg-offset-5 btn btn-success" href="{{route('permission.index')}}">SHOW PERMISSION</a>

          </div>


          @if(count($errors)>0)
          @foreach($errors->all() as $error)
          <p class="alert alert-danger">{{$error}}</p>
          @endforeach
          @endif

          <!-- form start -->
          <form role="form"  action="{{ route('permission.store')}}" method="post">
                     {{ csrf_field() }}

            <div class="box-body">
      <div class="col-md-6">
        <div class="form-group">
          <label for="name">Permission Name</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Enter Permission Name">
        </div>
        <div class="form-group">
          <label for="for">Permission For</label>
          <select class="form-control" name="for" id="for">
            <option selected disabled>Select Permission For</option>
            <option value="post">Post</option>
            <option value="user">User</option>
            <option value="other">Other</option>
          </select>
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
