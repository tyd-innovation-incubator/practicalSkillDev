@extends('layouts.admin.app')

@section('main-content')
<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Role</h3>
            <a class="col-lg-offset-5 btn btn-success" href="{{route('role.index')}}">SHOW ROLES</a>

          </div>


          @if(count($errors)>0)
          @foreach($errors->all() as $error)
          <p class="alert alert-danger">{{$error}}</p>
          @endforeach
          @endif

          <!-- form start -->
          <form role="form"  action="{{ route('role.update',$role->id)}}" method="post">
                     {{ csrf_field() }}
                     {{ method_field('PUT') }}


            <div class="box-body">
      <div class="col-md-6">
        <div class="form-group">
          <label for="name">Role Name</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Enter Tag Name" value="{{$role->name}}">
        </div>

                <div class="row">

                <div class="col-lg-4">
                  <label>Post Permission</label>
                  @foreach($permissions as $permission)
                  @if($permission->for == 'post')
                  <div class="checkbox">
                    <label><input type="checkbox" name="permission[]" value="{{$permission->id}}"
            @foreach($role->permissions as $role_permit)
            @if($role_permit->id == $permission->id)
               checked
               @endif
               @endforeach
                       >{{$permission->name}}</label>
                  </div>
                  @endif
                  @endforeach
                </div>

                        <div class="col-lg-4">
                          <label>User Permission</label>
                          @foreach($permissions as $permission)
                          @if($permission->for == 'user')
                          <div class="checkbox">
                            <label><input type="checkbox" name="permission[]" value="{{$permission->id}}"
                              @foreach($role->permissions as $role_permit)
                              @if($role_permit->id == $permission->id)
                                 checked
                                 @endif
                                 @endforeach
                              >{{$permission->name}}</label>
                          </div>
                          @endif
                          @endforeach
                        </div>
                        <div class="col-lg-4">
                          <label>Other Permission</label>
                          @foreach($permissions as $permission)
                          @if($permission->for == 'other')
                          <div class="checkbox">
                            <label><input type="checkbox" name="permission[]" value="{{$permission->id}}"
                              @foreach($role->permissions as $role_permit)
                              @if($role_permit->id == $permission->id)
                                 checked
                                 @endif
                                 @endforeach
                              >{{$permission->name}}</label>
                          </div>
                          @endif
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
