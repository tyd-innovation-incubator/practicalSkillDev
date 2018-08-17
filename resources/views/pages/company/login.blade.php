@extends('layouts.app')

@section('content')

<div class="context-dark">
		<section class="breadcrumb-modern rd-parallax bg-gray-darkest">
			<div data-speed="0.2" data-type="media" data-url="http://www.powerjob.in/images/background-02-1920x870.jpg" class="rd-parallax-layer"></div>
			<div data-speed="0" data-type="html" class="rd-parallax-layer">
				<div class="bg-overlay-gray-darkest">
					<div class="shell section-top-98 section-bottom-34 section-md-bottom-66 section-md-98 section-lg-top-155 section-lg-bottom-66">
						<div class="text-extra-big text-bold veil reveal-md-block">Company</div>
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
							<li>Login</li>
							<li>Registration</li>
						</ul>
						<div data-group="tabs-group-default" class="resp-tabs-container text-left tabs-group-default">
							<div>
								<div class="range range-xs-center section-34">
									<div class="cell-xs-8 cell-sm-6 cell-md-4">
										<form class="form-horizontal" role="form" method="POST" action="http://www.powerjob.in/company/login">
											<input type="hidden" name="_token" value="adV2vjXIggMeqgkAPknX4JCa9Y6BIudCpHEgXUQF">
											<div class="form-group">
												<label for="form-login-username" class="form-label form-label-outside">Company Email:</label>
																									<input id="form-login-username" type="email" name="email" value="" data-constraints="@Required" class="form-control bg-white" >

																							</div>
											<div class="form-group offset-top-24">
												<label for="form-login-password" class="form-label form-label-outside">Password:</label>
																									<input id="form-login-password" type="password" name="password" value="" data-constraints="@Required" class="form-control bg-white">

																							</div>
											<div class="form-group">
                            					<!-- <div class="col-md-6 pull-left" style="padding:0;">
                                					<div class="form-group">
														<label class="checkbox-inline">
															<input name="input-group-radio" value="checkbox-1" type="checkbox" class="checkbox-custom">Remember me
														</label>
													</div>
                            					</div> -->
                            					<div class="col-md-6 col-md-offset-6 text-right" style="padding:10px 0 0 0;">
                            						<div class="box-forgot">
                            							<a href="/password/reset">Forgot Your Password?</a>
                            						</div>
                            					</div>
                        					</div>
											<div class="form-group offset-top-24">
												<div class="form-group has-feedback">
																											<button type="submit" class="btn btn-primary btn-block">Sign In</button>
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
						<div>
						<div class="range range-xs-center section-34">
							<div class="cell-xs-8 cell-sm-6 cell-md-4">
								<form class="form-horizontal" role="form" method="POST" action="http://www.powerjob.in/company/register">
									<input type="hidden" name="_token" value="adV2vjXIggMeqgkAPknX4JCa9Y6BIudCpHEgXUQF">
									<input type="hidden" name="role" value="company">
									<div class="form-group">
										<label for="form-register-username" class="form-label form-label-outside">Company Name:</label>
																					<input id="form-register-username" type="text" name="name" data-constraints="@Required" value=""  class="form-control bg-white">

																			</div>
									<div class="form-group offset-top-24">
										<label for="form-register-email" class="form-label form-label-outside">Company Email:</label>
																					<input id="form-register-email" type="text" name="email" data-constraints="@Required  @Email" value=""  class="form-control bg-white">

																			</div>
									<div class="form-group offset-top-24">
										<label for="form-register-password" class="form-label form-label-outside">Password:</label>
																					<input id="form-register-password" type="password" name="password" data-constraints="@Required"  class="form-control bg-white">

									</div>

									<div class="form-group offset-top-24">
										<label for="form-register-confirm-password" class="form-label form-label-outside">Confirm Password:</label>
																					<input id="form-register-confirm-password" type="password" name="password_confirmation" data-constraints="@Required" class="form-control bg-white">

																			</div>
									<div class="offset-top-24">
																					<button type="submit" class="btn btn-primary btn-block">create an account</button>
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
