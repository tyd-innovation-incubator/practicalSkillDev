@extends('layouts.app')

@section('content')

		<!-- Title Header Start -->
		<section class="signup-screen-sec">
			{!! Form::open(['url' => 'register', 'autocomplete' => 'off', 'class' => 'needs-validation', 'novalidate','style'=>"background-color: ; margin-left: 100px"]) !!}
					{{--<form class="form-horizontal" method="POST" action="{{ route('register') }}" style="background-color: ; margin-left: 100px">--}}
						{{ csrf_field() }}

						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col-sm-12">
										<div class="row">
											<div class="col-xs-12 col-sm-6 col-md-4">
												<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
													<label for="">First Name</label>

														<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="" required autofocus>
														@if ($errors->has('firstname'))
															<span class="help-block">
														<strong>{{ $errors->first('firstname') }}</strong>
												</span>
														@endif
												</div>
											</div>
											<div class="col-xs-12 col-sm-6 col-md-4">
												<div class="form-group{{ $errors->has('othernames') ? ' has-error' : '' }}">
													<label for="">OtherNames</label>

													<input id="othernames" type="text" class="form-control" name="othernames" value="{{ old('othernames') }}" placeholder="" required autofocus>
													@if ($errors->has('name'))
														<span class="help-block">
														<strong>{{ $errors->first('othernames') }}</strong>
												</span>
													@endif
												</div>
											</div>
										</div>
									</div>
								</div>


								<div class="row" style="margin-top: 20px;">
									<div class="col-sm-12">
										<div class="row">
											<div class="col-xs-12 col-sm-6 col-md-4">
												<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
													<label for="">Email</label>

													<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="" required autofocus>
													@if ($errors->has('email'))
														<span class="help-block">
														<strong>{{ $errors->first('email') }}</strong>
												</span>
													@endif
												</div>
											</div>
											<div class="col-xs-12 col-sm-6 col-md-4">
												<div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
													<label for="">Username</label>

													<input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="" required autofocus>
													@if ($errors->has('username'))
														<span class="help-block">
														<strong>{{ $errors->first('username') }}</strong>
												</span>
													@endif
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="row" style="margin-top: 20px;">
									<div class="col-sm-12">
										<div class="row">
											<div class="col-xs-12 col-sm-6 col-md-4">
												<div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
													<label for="">Phone</label>

													<input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="" required autofocus>
													@if ($errors->has('phone'))
														<span class="help-block">
														<strong>{{ $errors->first('phone') }}</strong>
												</span>
													@endif
												</div>
											</div>
											<div class="col-xs-12 col-sm-6 col-md-4">
												<div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
													<label for="">Country</label>
													{!! Form::select('country',$countries, [], ['class' => 'form-control select2', 'placeholder' => '', 'autocomplete' => 'off', 'id' => 'country', 'aria-describedby' => 'countryHelp', 'required']) !!}
													{{--<small id="countryHelp" class="form-text text-muted">{{ __("label.country_helper") }}</small>--}}
													{!! $errors->first('country', '<span class="badge badge-danger">:message</span>') !!}

													{{--<input id="country" type="text" class="form-control" name="country" value="{{ old('country') }}" placeholder="" required autofocus>--}}
													{{--@if ($errors->has('country'))--}}
														{{--<span class="help-block">--}}
														{{--<strong>{{ $errors->first('country') }}</strong>--}}
												{{--</span>--}}
													{{--@endif--}}
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="row" style="margin-top: 20px;">
									<div class="col-sm-12">
										<div class="row">
											<div class="col-xs-12 col-sm-6 col-md-4">
												<div class="form-group{{ $errors->has('region') ? ' has-error' : '' }}">
													<label for="">Region</label>

													{!! Form::select('region',$regions, [], ['class' => 'form-control select2', 'placeholder' => '', 'autocomplete' => 'off', 'id' => 'country', 'aria-describedby' => 'countryHelp', 'required']) !!}
													@if ($errors->has('region'))
														<span class="help-block">
														<strong>{{ $errors->first('region') }}</strong>
												</span>
													@endif
												</div>
											</div>
											<div class="col-xs-12 col-sm-6 col-md-4">
												<div class="form-group{{ $errors->has('province') ? ' has-error' : '' }}">
													<label for="">City</label>

													<input id="province" type="text" class="form-control" name="province" value="{{ old('province') }}" placeholder="" required autofocus>
													@if ($errors->has('province'))
														<span class="help-block">
														<strong>{{ $errors->first('province') }}</strong>
												</span>
													@endif
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="row" style="margin-top: 20px;">
									<div class="col-sm-12">
										<div class="row">
											<div class="col-xs-12 col-sm-6 col-md-4">
												<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
													<label for="">Password</label>

													<input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="" required autofocus>
													@if ($errors->has('password'))
														<span class="help-block">
														<strong>{{ $errors->first('password') }}</strong>
												</span>
													@endif
												</div>
											</div>
											<div class="col-xs-12 col-sm-6 col-md-4">
												<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
													<label for="">Confirm Password</label>

													<input id="country" type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder=" " required autofocus>
													@if ($errors->has('password_confirmation'))
														<span class="help-block">
														<strong>{{ $errors->first('password_confirmation') }}</strong>
												</span>
													@endif
												</div>
											</div>
										</div>
									</div>
								</div>


							</div>
						</div>






						<div class="form-group" style="margin-top:10px;">
								<div class="col-md-6 ">
										<button type="submit" class="btn btn-primary">
												Register
										</button>
										<span>Have You Account? <a href="/login"> Login</a></span>

								</div>
						</div>
			{!! Form::close() !!}
		</section>

@endsection
