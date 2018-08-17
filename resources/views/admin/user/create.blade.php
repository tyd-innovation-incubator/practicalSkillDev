@extends('layouts.admin.app')

@section('main-content')
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">User</h3>
            <a class="col-lg-offset-5 btn btn-success" href="{{route('user.index')}}">SHOW USERS</a>

          </div>


          @if(count($errors)>0)
          @foreach($errors->all() as $error)
          <p class="alert alert-danger">{{$error}}</p>
          @endforeach
          @endif

          <!-- form start -->
          <form role="form"  action="{{ route('user.store')}}" method="post">
                     {{ csrf_field() }}

            <div class="box-body">
      <div class="col-md-6">
        <div class="form-group">
          <label for="name">User Name</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Enter admin Name" value="{{old('name')}}">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="{{old('email')}}">
        </div>
        <div class="form-group">
          <label for="phone">Phone</label>
          <input type="phone" class="form-control" id="phone" placeholder="Phone" name="phone" value="{{old('phone')}}" >
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" placeholder="Password" name="password" value="{{old('password')}}">
        </div>
        <div class="form-group">
          <label for="password_confirmation">Confirm Password</label>
          <input type="password" class="form-control" id="password_confirmation" placeholder="Confirm Password" name="password_confirmation">
        </div>
        <div class="form-group">
          <label for="confirm_password">Status</label>
          <div class="checkbox">
            <label><input type="checkbox" name="status" value="1">Status</label>
        </div>
              </div>

        <div class="form-group col-lg-12" >
          <label for="">Assign Role</label>
          <div class="row">
            @foreach($roles as $role)
            <div class="col-lg-3">
              <div class="checkbox">
                <label><input type="checkbox" name="role[]" value="{{$role->id}}">{{$role->name}}</label>
            </div>
               </div>
            @endforeach
          </div>



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
