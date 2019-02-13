@extends('layouts.app')

@section('content')
	<div class="Loader"></div>
	<div class="wrapper">

		<!-- Title Header Start -->
		<section class="signup-screen-sec">
          <form class="form-horizontal" method="POST" action="{{ route('login') }}" style="margin-left: 450px" autocomplete="off">
              {{ csrf_field() }}

              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}" >

                  <div class="col-md-4">
                      <label for="">Email</label>

                          <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="" required autofocus>

                      @if ($errors->has('email'))
                          <span class="help-block">
                              <strong>{{ $errors->first('email') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}" style="margin-top:10px;">
                  <div class="col-md-4">
                      <label for="">Password</label>

                      <input id="password" type="password" class="form-control" name="password" value="" placeholder="" required autofocus>
                      @if ($errors->has('password'))
                          <span class="help-block">
                              <strong>{{ $errors->first('password') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

              <div class="form-group">
                  <div class="col-md-6 ">
                      <div class="checkbox">
                          <label>
                              <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                          </label>
                      </div>
                  </div>
              </div>

              <div class="form-group" style="margin-top: 10px">
                  <div class="col-md-8">
                      <button type="submit" class="btn btn-success">
                          Login
                      </button>
<span>   <a class="btn btn-link" href="{{ route('password.request') }}">
  Forgot Your Password?
</a></span>

                  </div>
              </div>
          </form>
		</section>
	</div>
@endsection
