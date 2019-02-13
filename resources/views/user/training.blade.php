@extends('layouts.app')

@section('content')
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.1&appId=2144837425795845&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>




		<!-- Breadcrumb Bar -->
		<div class="section breadcrumb-bar solid-blue-bg">
			<div class="inner">
				<div class="container-fluid">
					<p class="breadcrumb-menu">
						<a href="index-2.html"><i class="ion-ios-home"></i></a>
						<i class="ion-ios-arrow-right arrow-right"></i>
						<a href="#0">Job listing - list view</a>
					</p> <!-- end .breabdcrumb-menu -->
					<h2 class="breadcrumb-title flex items-center">{{$training->Title}}
						<button type="button" class="button full-time button-sm">{{$training->Employment_type}}</button>
					</h2>
				</div> <!-- end .container-fluid -->
			</div> <!-- end .inner -->
		</div> <!-- end .section -->

		<!-- Job Listings Section -->
		<div class="section jobs-details-section">
			<div class="container-fluid">
				<div class="jobs-details-wrapper flex no-wrap">

					<div class="left-side">


						<div class="divider"></div>

						<div class="featured-jobs-widget-wrapper jobs-widget">
							<h6>Featured Jobs</h6>
							<div class="featured-jobs-widget">
                @foreach($training as $train)

								<div class="featured-job flex items-center no-column no-wrap">
									<div class="left-side-inner">
										<img src="/image/company-logo16.jpg" alt="company-logo" class="img-responsive">
									</div> <!-- end .left-side -->
									<div class="right-side-inner">
										<h5 class="dark">{{$training->Title}}</h5>
										<h5>{{$training->company_name}}</h5>
									</div> <!-- end .right-side -->
								</div> <!-- end .featured-job -->
@endforeach
							

							</div> <!-- end .featured-jobs-widget -->

						</div> <!-- end .featured-jobs-widget-wrapper -->

						<div class="divider"></div>


					</div> <!-- end .left-side -->

					<div class="right-side-wrapper">
						<div class="right-side-top">
							<h6><span><i class="ion-ios-arrow-left"></i></span>Back to <a href="#0">Technologies</a></h6>
							<div class="right-side-top-inner flex no-wrap">

								<div class="job-post-wrapper">
									<div class="job-post-top flex no-column no-wrap">
										<div class="job-post-top-left">
											<img src="/image/company-logo-big01.jpg" alt="company-logo" class="img-responsive">
										</div> <!-- end .left-side-inner -->
										<div class="job-post-top-right">
											<h4 class="dark">{{$training->Title}}</h4>
											<h5>{{$training->company_name}}</h5>
											<div class="job-post-meta flex items-center no-column no-wrap">
												<div class="bookmarked-job-meta flex items-center no-wrap no-column">
													<h6 class="bookmarked-job-category">Technologies</h6>
						        					<h6 class="candidate-location">{{$training->location}}</span></h6>
													<h6 class="hourly-rate">{{$training->salary}}<span></span></h6>
						        				</div>
					        					<h6 class="full-time">{{$training->Employment_type}}</h6>
											</div> <!-- end .job-post-meta -->
										</div> <!-- end .right-side-inner -->
									</div> <!-- end .job-post-top -->

									<div class="divider"></div>

									<div class="job-post-bottom">
										<h4 class="dark">Job Description</h4>
									{!! htmlspecialchars_decode($training->Description)!!}
										<div class="divider"></div>

										<div class="job-post-share flex space-between items-center no-wrap">
											<div class="job-post-share-left flex items-center no-wrap">
												<h6>Share this job:</h6>
												<ul class="social-share flex no-wrap no-column list-unstyled">
													<li><a href="#0" class="button button-sm facebook-btn"><span><i class="ion-social-facebook"></i></span>Facebook</a></li>
													<li><a href="#0" class="button button-sm twitter-btn"><span><i class="ion-social-twitter"></i></span>Twitter</a></li>
													<li><a href="#0" class="button button-sm g-plus-btn"><span><i class="ion-social-googleplus"></i></span>Google plus</a></li>
												</ul> <!-- end .social-share -->
											</div> <!-- end .job-post-share-left -->
											<div class="job-post-share-right flex items-center no-column no-wrap">
												<h6>Bookmark this job</h6>
												<i class="ion-ios-heart wishlist-icon"></i>
											</div> <!-- end .job-post-share-right -->

										</div> <!-- end .job-post-share -->

									</div> <!-- end .job-post-bottom -->

								</div> <!-- end .left-side-inner -->

								<div class="right-side-inner">
									<div id="map" class="map on-job-details-page"></div>
									<div class="job-post-company-info">
										<h5 class="dark">{{$training->company_name}}</h5>
										<ul class="list-unstyled">
											<li class="flex no-column no-wrap"><i class="ion-ios-location"></i>{{$training->location}}</li>
											<li class="flex no-column no-wrap"><i class="ion-ios-telephone"></i><a href="tel:(+01)-212-342-6789">{{$training->phone}}</a></li>

										</ul>
									</div> <!-- end .job-post-company-info -->

									<div class="apply-for-job">
										<p class="divider-text text-center"><span>Apply for this job</span></p>
										<div class="apply-btn-group flex space-center items-center no-column no-wrap">
											<button type="button" class="button facebook-btn">Via Facebook</button>
											<button type="button" class="button linkedln-btn">Via Linkedln</button>
										</div> <!-- end .apply-btn-group -->
									</div> <!-- end .apply-for-job -->

									<div class="system-login text-center">
										<h6>Or login using our system</h6>
										<button type="submit" class="button">Submit your resume</button>
									</div> <!-- end .system-login -->

								</div> <!-- end .right-side-inner -->

							</div> <!-- end .left-side-top -->

							<div class="right-side-bottom-wrapper">

						        <div class="bookmarked-jobs-list-wrapper on-listing-page on-job-detals-page">
									<h3>Similar jobs from<span>{{$training->location}}</span></h3>
						        	<div class="bookmarked-job-wrapper">
						        		<div class="bookmarked-job flex no-wrap no-column ">
							        		<div class="job-company-icon">
							        			<img src="/image/company-logo-big01.jpg" alt="company-icon" class="img-responsive">
							        		</div> <!-- end .job-icon -->
							        		<div class="bookmarked-job-info">
							        			<h4 class="dark flex no-column">{{$training->Title}}<a href="#0" class="button full-time"></a></h4>
							        			<h5>{{$training->company_name}}</h5>
							        			<p>{{$training->subtitle}}</p>
							        			<div class="bookmarked-job-info-bottom flex space-between items-center no-column no-wrap">
							        				<div class="bookmarked-job-meta flex items-center no-wrap no-column">

														<h6 class="bookmarked-job-category">Art/Design</h6>
							        					<h6 class="candidate-location"><span>{{$training->location}}</span></h6>
														<h6 class="hourly-rate">{{$training->salary}}<span></span></h6>
							        				</div> <!-- end .bookmarked-job-meta -->
							        				<div class="right-side-bookmarked-job-meta flex items-center no-column no-wrap">
							        					<i class="ion-ios-heart wishlist-icon" style="margin-left:20px;"></i>
							        					<a href="{{route('Traininglist.show',$training->id)}}" class="button">more detail</a>
							        				</div> <!-- end .right-side-bookmarked-job-meta -->
							        			</div> <!-- end .bookmarked-job-info-bottom -->
							        		</div> <!-- end .bookmarked-job-info -->
						        		</div> <!-- end .bookmarked-job -->
						        	</div> <!-- end .bookmarked-job-wrapper -->
					        	</div> <!-- end .bookmarked-jobs-list-wrapper -->
							</div> <!-- end .right-side-bottom-wrapper -->
							</div> <!-- end .right-side-top-inner -->
						</div> <!-- end .right-side-top -->
					</div> <!-- end .right-side-wrapper -->
				</div> <!-- end .jobs-details-wrapper -->
			</div> <!-- end .container-fluid -->
		</div> <!-- end .section -->


@endsection
