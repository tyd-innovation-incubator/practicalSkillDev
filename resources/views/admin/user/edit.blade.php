@extends('layouts.admin.app')

@section('main-content')
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Edit User</h3>
            <a class="col-lg-offset-5 btn btn-success" href="{{route('user.index')}}">SHOW USERS</a>

          </div>


          @if(count($errors)>0)
          @foreach($errors->all() as $error)
          <p class="alert alert-danger">{{$error}}</p>
          @endforeach
          @endif

          <!-- form start -->
          <form role="form"  action="{{ route('user.update',$user->id)}}" method="post">
                     {{ csrf_field() }}
                     {{method_field('PUT')}}

            <div class="box-body">
      <div class="col-md-6">
        <div class="form-group">
          <label for="name">User Name</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Enter admin Name" value="@if(old('name')){{old('name')}}@else{{$user->name}}@endif">
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="@if(old('email')){{old('email')}}@else{{$user->email}}@endif">
        </div>
        <div class="form-group">
          <label for="phone">Phone</label>
          <input type="phone" class="form-control" id="phone" placeholder="Phone" name="phone" value="@if(old('phone')){{old('phone')}}@else{{$user->phone}}@endif" >
        </div>

        <div class="form-group">
          <label for="confirm_password">Status</label>
          <div class="checkbox">
            <label><input type="checkbox" name="status"
               @if(old('status')==1 || $user->status==1)
  checked
               @endif
                         value="1">Status</label>
        </div>
              </div>

        <div class="form-group col-lg-12" >
          <label for="">Assign Role</label>
          <div class="row">
            @foreach($roles as $role)
            <div class="col-lg-3">
              <div class="checkbox">
                <label><input type="checkbox" name="role[]" value="{{$role->id}}"
                  @foreach($user->roles as $user_role)
                  @if($user_role->id == $role->id)
                  checked
                  @endif
                  @endforeach
                  >{{$role->name}}</label>
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
