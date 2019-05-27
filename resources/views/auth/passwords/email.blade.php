@extends('layouts.app')

@section('content')
<<<<<<< HEAD
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
=======
	<div class="context-dark">
		<section class="breadcrumb-modern rd-parallax bg-gray-darkest">
			<div data-speed="0.2" data-type="media" data-url="http://www.powerjob.in/images/background-02-1920x870.jpg" class="rd-parallax-layer"></div>
			<div data-speed="0" data-type="html" class="rd-parallax-layer">
				<div class="bg-overlay-gray-darkest">
					<div class="shell section-top-98 section-bottom-34 section-md-bottom-66 section-md-98 section-lg-top-155 section-lg-bottom-66">
					</div>
				</div>
			</div>
		</section>
	</div>
<div class="container" style="margin-top:30px; margin-bottom:30px;">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>

                <div class="panel-body">
>>>>>>> 1156cf3bfa4bf2513e851ccbffac807c55ad3cc4
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

<<<<<<< HEAD
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
=======
                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
>>>>>>> 1156cf3bfa4bf2513e851ccbffac807c55ad3cc4
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

<<<<<<< HEAD
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
=======
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-success" style="margin-top:10px; margin-left:40px;">
                                    Send Password Reset Link
>>>>>>> 1156cf3bfa4bf2513e851ccbffac807c55ad3cc4
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
