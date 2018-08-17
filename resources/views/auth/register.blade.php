@extends('layouts.app')

@section('content')

			<div class="context-dark">
		<section class="breadcrumb-modern rd-parallax bg-gray-darkest">
			<div data-speed="0.2" data-type="media" data-url="http://www.powerjob.in/images/background-02-1920x870.jpg" class="rd-parallax-layer"></div>
			<div data-speed="0" data-type="html" class="rd-parallax-layer">
				<div class="bg-overlay-gray-darkest">
					<div class="shell section-top-98 section-bottom-34 section-md-bottom-66 section-md-98 section-lg-top-155 section-lg-bottom-66">
						<div class="text-extra-big text-bold veil reveal-md-block">User</div>
						<ul class="list-inline list-inline-dashed p offset-top-0 offset-lg-top-20">
							<li><a href="index.html">Home</a></li>
							<li>Login or Registration</li>
						</ul>
					</div>
				</div>
			</div>
		</section>
	</div>

  <main class="page-content">
<section class="section-98 section-sm-110">
<div class="shell">
<h1>Sign In</h1>
<hr class="divider bg-darkers">
<div class="offset-sm-top-66">
<div data-type="horizontal" class="responsive-tabs responsive-tabs-classic">
<ul data-group="tabs-group-default" class="resp-tabs-list tabs-1 text-center tabs-group-default">
  <li><a href="{{ route('login') }}">Login</a></li>
<li><a href="{{ route('register') }}">Register</a></li>
</ul>
<div data-group="tabs-group-default" class="resp-tabs-container text-left tabs-group-default">

<div>
<div class="range range-xs-center section-34">
<div class="cell-xs-8 cell-sm-6 cell-md-4">
<form class="form-horizontal" method="POST" action="{{ route('register') }}">
  {{ csrf_field() }}

  <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
      <label for="name" class="col-md-4 control-label">Name</label>

      <div class="col-md-6">
          <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

          @if ($errors->has('name'))
              <span class="help-block">
                  <strong>{{ $errors->first('name') }}</strong>
              </span>
          @endif
      </div>
  </div>

<div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
<label for="username" class="col-md-4 control-label">Username</label>

<div class="col-md-6">
<input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required>

@if ($errors->has('username'))
<span class="help-block">
<strong>{{ $errors->first('username') }}</strong>
</span>
@endif
</div>
</div>
  <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
      <label for="email" class="col-md-4 control-label">E-Mail Address</label>

      <div class="col-md-6">
          <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

          @if ($errors->has('email'))
              <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
              </span>
          @endif
      </div>
  </div>

  <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
      <label for="password" class="col-md-4 control-label">Password</label>

      <div class="col-md-6">
          <input id="password" type="password" class="form-control" name="password" required>

          @if ($errors->has('password'))
              <span class="help-block">
                  <strong>{{ $errors->first('password') }}</strong>
              </span>
          @endif
      </div>
  </div>

  <div class="form-group">
      <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

      <div class="col-md-6">
          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
      </div>
  </div>

  <div class="form-group">
      <div class="col-md-6 col-md-offset-4">
          <button type="submit" class="btn btn-primary">
              Register
          </button>
      </div>
  </div>
</form>
<!--<div class="offset-top-30 text-center">
<p>or enter with</p>
<ul class="list-inline">
  <li><a href="#" class="icon fa fa-facebook icon-xxs icon-circle icon-darkest-filled"></a></li>
  <li><a href="#" class="icon fa fa-twitter icon-xxs icon-circle icon-darkest-filled"></a></li>
  <li><a href="#" class="icon fa fa-linkedin icon-xxs icon-circle icon-darkest-filled"></a></li>
</ul>
</div>-->
</div>
</div>
</div>
</div>
</div>
</section>
</main>


@endsection
