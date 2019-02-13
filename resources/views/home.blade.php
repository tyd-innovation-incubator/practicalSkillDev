@extends('layouts.app')


@section('content')


		<!-- Hero Section -->
		<div class="section hero-section transparent" style="background-image: url('image/DAR ES SALAM - GettyImages-488050656.jpg');">
			<div class="inner">
				<div class="container">
          <div class="banner-caption">
              <div class="col-md-12 col-sm-12 banner-text">
                <h1>Browse Your Training</h1>
                <form class="form-horizontal">
                  <div class="col-md-4 no-padd">
                     <div class="input-group">
                       <input type="text" class="form-control right-bor" placeholder="Skills, Designations, Companies">
                     </div>
                  </div>
                  <div class="col-md-4 no-padd">
                     <div class="input-group">
                       <input type="text" class="form-control right-bor" placeholder="Search By Location..">
                     </div>
                  </div>



                  <div class="col-md-3 no-padd">
                    <div class="input-group">
                      <button type="submit" class="btn btn-primary">Search Training</button>
                    </div>
                  </div>
                </form>
                <div class="video-box">
                  <a href="#" class="btn btn-video"><i class="fa fa-play" aria-hidden="true"></i></a>
                </div>
              </div>
          </div> <!-- end .job-search-form -->
				</div> <!-- end .container -->
				<div class="features-bar">
					<div class="container">
						<div class="features-bar-inner flex space-between">
							<div class="features-box self-center">
								<h3>Leading the industry</h3>
								<a href="/about">About us<i class="ion-ios-arrow-thin-right"></i></a>
							</div> <!-- end .feature-box -->
							<div class="features-box-icon flex no-wrap">
								<img src="image/feature-icon01.png" alt="cup-icon" class="img-responsive self-center">
								<div class="content self-center">
									<h3>High average salary</h3>
									<a href="#0">Learn more<i class="ion-ios-arrow-thin-right"></i></a>
								</div> <!-- end .content -->
							</div> <!-- end .feature-box-icon -->
							<div class="features-box-icon flex no-wrap">
								<img src="image/feature-icon02.png" alt="cup-icon" class="img-responsive self-center">
								<div class="content self-center">
									<h3>2,500,000+ candidates</h3>
									<a href="#0">Our community<i class="ion-ios-arrow-thin-right"></i></a>
								</div> <!-- end .content -->
							</div> <!-- end .feature-box-icon -->
							<div class="user-profile-icon self-center">
								<img src="image/profile-icon01.png" alt="profile-icon" class="img-responsive self-center">
							</div> <!-- end .profile-icon -->
						</div> <!-- end .features-bar-inner -->
					</div> <!-- end .container -->
				</div> <!-- end .features-bar -->
			</div> <!-- end .inner -->
		</div> <!-- end .section -->

    <!-- Work Process Counter Section Start -->
    <section class="wp-process" style="background:whitesmoke">
      <div class="container">
        <div class="row">
          <div class="main-heading">
            <p>How We Work</p>
            <h2>PRACTICAL SKILL DEVELOPMENT LINK (<span>PRASDEL</span>)</h2>
          </div>
        </div>
        <!--/row-->
        <div class="col-md-4 col-sm-6">
          <div class="work-process">
            <div class="work-process-icon">
              <span class="icon-search"></span>
            </div>
            <div class="work-process-caption">
              <h4>Search Job</h4>
              <p>Aliquam vestibulum cursus felis. In iaculis iaculis sapien ac condimentum. Vestibulum congue posuere lacus</p>
            </div>
          </div>
        </div>

        <div class="col-md-4 col-sm-6">
          <div class="work-process">
            <div class="work-process-icon">
              <span class="icon-mobile"></span>
            </div>
            <div class="work-process-caption">
              <h4>Find Job</h4>
              <p>Aliquam vestibulum cursus felis. In iaculis iaculis sapien ac condimentum. Vestibulum congue posuere lacus</p>
            </div>
          </div>
        </div>

        <div class="col-md-4 col-sm-6">
          <div class="work-process">
            <div class="work-process-icon">
              <span class="icon-profile-male"></span>
            </div>
            <div class="work-process-caption">
              <h4>Hire Employee</h4>
              <p>Aliquam vestibulum cursus felis. In iaculis iaculis sapien ac condimentum. Vestibulum congue posuere lacus</p>
            </div>
          </div>
        </div>

        <div class="col-md-4 col-sm-6">
          <div class="work-process">
            <div class="work-process-icon">
              <span class="icon-layers"></span>
            </div>
            <div class="work-process-caption">
              <h4>Start Work</h4>
              <p>Aliquam vestibulum cursus felis. In iaculis iaculis sapien ac condimentum. Vestibulum congue posuere lacus</p>
            </div>
          </div>
        </div>

        <div class="col-md-4 col-sm-6">
          <div class="work-process">
            <div class="work-process-icon">
							<span class="icon-wallet"></span>
          </div>
            <div class="work-process-caption">
              <h4>Pay Money</h4>
              <p>Aliquam vestibulum cursus felis. In iaculis iaculis sapien ac condimentum. Vestibulum congue posuere lacus</p>
            </div>
          </div>
        </div>

        <div class="col-md-4 col-sm-6">
          <div class="work-process">
            <div class="work-process-icon">
              <span class="icon-happy"></span>
            </div>
            <div class="work-process-caption">
              <h4>Happy</h4>
              <p>Aliquam vestibulum cursus felis. In iaculis iaculis sapien ac condimentum. Vestibulum congue posuere lacus</p>
            </div>
          </div>
        </div>

      </div>
    </section>
    <div class="clearfix"></div>
    <!-- Work Process Counter Section End -->
		<!-- Latest Jobs Section -->
		{{--<div class="section Latest-jobs-section">--}}
			{{--<div class="inner">--}}
				{{--<div class="container">--}}
					{{--<div class="main-heading">--}}
						{{--<h2>Latest <span>Trainings</span></h2>--}}
					{{--</div>--}}
					{{--<div class="section-top-content flex items-center">--}}
						{{--<h1></h1>--}}
						{{--<a href="/Traininglist">View all Trainings<i class="ion-ios-arrow-thin-right"></i></a>--}}
					{{--</div> <!-- end .section-top-content -->--}}

					{{--<div class="jobs-table">--}}
						{{--<div class="table-header">--}}
							{{--<div class="table-cells flex">--}}
								{{--<div class="job-title-cell"><h6>Job title / Company name</h6></div>--}}
								{{--<div class="job-type-cell"><h6>Type</h6></div>--}}
								{{--<div class="location-cell"><h6>Location</h6></div>--}}
								{{--<div class="expired-date-cell"><h6>Expired Date</h6></div>--}}
								{{--<div class="salary-cell"><h6>Salary</h6></div>--}}
							{{--</div> <!-- end .table-cells -->--}}
						{{--</div> <!-- end .table-header -->--}}
            {{--@foreach($training as $train)--}}

						{{--<div class="table-row">--}}
							{{--<div class="table-cells flex no-wrap">--}}
								{{--<div class="cell job-title-cell flex no-column no-wrap">--}}
									{{--<div class="cell-mobile-label">--}}
										{{--<h6>Company name</h6>--}}
									{{--</div> <!-- end .cell-label -->--}}
                  {{--<a href="{{route('Traininglist.show',$train->id)}}">--}}
                  {{--{{$train->company_name}}--}}
                  {{--</a>--}}
										{{--<div class="content">--}}
										{{--<h4><a href="job-details.html">{{$train->Title}}</a></h4>--}}
										{{--<p class="small">{{$train->subtitle}}</p>--}}
									{{--</div> <!-- end .content -->--}}
								{{--</div> <!-- end .job-title-cell -->--}}
								{{--<div class="cell job-type-cell flex no-column no-wrap">--}}
									{{--<div class="cell-mobile-label">--}}
										{{--<h6>Type</h6>--}}
									{{--</div> <!-- end .cell-label -->--}}
									{{--<button type="button" class="button full-time">{{$train->Employment_type}}</button>--}}
								{{--</div>--}}
								{{--<div class="cell location-cell flex no-column no-wrap">--}}
									{{--<div class="cell-mobile-label">--}}
										{{--<h6>Location</h6>--}}
									{{--</div> <!-- end .cell-label -->--}}
									{{--<p><span>{{$train->location}}</span></p>--}}
								{{--</div>--}}
								{{--<div class="cell expired-date-cell flex no-column no-wrap">--}}
									{{--<div class="cell-mobile-label">--}}
										{{--<h6>Posted on</h6>--}}
									{{--</div> <!-- end .cell-label -->--}}
									{{--<p><span>{{$train->created_at}}</span></p>--}}
								{{--</div>--}}
								{{--<div class="cell salary-cell flex no-column no-wrap">--}}
									{{--<div class="cell-mobile-label">--}}
										{{--<h6>Salary</h6>--}}
									{{--</div> <!-- end .cell-label -->--}}
									{{--<p><sup>$</sup>{{$train->salary}}<span>/hour</span></p>--}}
								{{--</div>--}}
							{{--</div> <!-- end .table-cells -->--}}
						{{--</div> <!-- end .table-row -->--}}
     {{--@endforeach--}}
						{{--<div class="table-footer flex space-between items-center">--}}
							{{--<div class="jobpress-custom-pager list-unstyled flex space-between no-column items-center">--}}
								{{--<a href="#0" class="button"><i class="ion-ios-arrow-left"></i>Prev</a>--}}
								{{--<ul class="list-unstyled flex no-column items-center">--}}
									{{--<li><a href="#0">1</a></li>--}}

								{{--</ul>--}}
								{{--<a href="#0" class="button">Next<i class="ion-ios-arrow-right"></i></a>--}}
							{{--</div> <!-- end .jobpress-custom-pager -->--}}
						{{--</div>--}}
					{{--</div> <!-- end .jobs-table -->--}}
				{{--</div> <!-- end .container -->--}}
			{{--</div> <!-- end .inner -->--}}
		{{--</div> <!-- end .section -->--}}

		<div class="section cta-section parallax text-center" style="background-image: url('image/background02.jpg');">
			<div class="inner">
				<div class="container">
					<h2>Looking for a Training</h2>
					<p class="large light">Join thousand of students and earn what you deserve</p>
					<div class="cta-button">
						<a href="/postresume" class="button">Get started now</a>
					</div> <!-- end .cta-button -->
				</div> <!-- end .container -->
			</div> <!-- end .inner -->
		</div> <!-- end .section -->

		<!-- Latest News Section -->
		<div class="section Latest-news-section">
			<div class="inner">
				<div class="container">
					<div class="main-heading">
						<h2>Latest <span>News</span></h2>
					</div>
					<div class="section-top-content flex items-center">
						<a href="/posts">View all news<i class="ion-ios-arrow-thin-right"></i></a>
					</div> <!-- end .section-top-content -->
					<div class="news-grid">
						<div class="news-grid-row flex space-between">
              @foreach($posts as $post)
							<div class="news-item">
								<img src="image/news-grid01.jpg" alt="news-thumbnail" class="img-responsive">
								<div class="news-content">
									<div class="news-meta flex no-column">
										<h6 class="publish-date">{{$post->created_at}}</h6>
									</div> <!-- end .news-meta -->
									<h3 class="news-title">{{$post->Title}}</h3>
									<p class="news-excerpt">{{$post->subtitle}}</p>
									<a href="{{ route('post',$post->slug)}}" class="button">Read More</a>
								</div> <!-- end .news-content -->
							</div> <!-- end .news-item -->
              @endforeach
						</div>  <!-- end .news-grid-row -->
					</div> <!-- end .news-grid -->
				</div> <!-- end .container -->
			</div> <!-- end .inner -->
		</div> <!-- end .section -->

		<div class="row" style="margin-bottom:30px;">
			<div class="container">
				<div class="col-md-12 col-sm-12 col-xs-12">
				 <h1>Clients & Partners</h1>
										 <div id="Carousel" class="carousel slide">

										 <ol class="carousel-indicators">
												 <li data-target="#Carousel" data-slide-to="0" class="active"></li>
												 <li data-target="#Carousel" data-slide-to="1"></li>
												 <li data-target="#Carousel" data-slide-to="2"></li>
										 </ol>

										 <!-- Carousel items -->
										 <div class="carousel-inner">
										 <div class="item active">
											<div class="row">
												<div class="col-md-2 col-xs-4"><a href="" class="thumbnail"><img src="https://3.bp.blogspot.com/-oyiuClRqAv8/W0Xul658ESI/AAAAAAAAZ7U/p_U8zaxPNSEX1WkWl97ruK1dK5rR-2vIQCLcBGAs/s1600/__800x800_59fFV.jpg" alt="Image" style="height:80px;"></a></div>
												<div class="col-md-2 col-xs-4"><a href="http://tyd.or.tz" class="thumbnail"><img src="image/tyd.png" alt="Image" style="height:80px;"></a></div>
												<div class="col-md-2 col-xs-4"><a href="" class="thumbnail"><img src="https://tyd.or.tz/img/projects/1521563057.jpg" alt="Image" style="height:80px;"></a></div>
												<div class="col-md-2 col-xs-4"><a href="" class="thumbnail"><img src="https://tyd.or.tz/img/projects/1518791268.jpg" alt="Image" style="height:80px;"></a></div>
											</div><!--.row-->
										 </div><!--.item-->

										 <div class="item">
											<div class="row">
                        <div class="col-md-2 col-xs-4"><a href="" class="thumbnail"><img src="https://3.bp.blogspot.com/-oyiuClRqAv8/W0Xul658ESI/AAAAAAAAZ7U/p_U8zaxPNSEX1WkWl97ruK1dK5rR-2vIQCLcBGAs/s1600/__800x800_59fFV.jpg" alt="Image" style="height:80px;"></a></div>
                        <div class="col-md-2 col-xs-4"><a href="http://tyd.or.tz" class="thumbnail"><img src="image/tyd.png" alt="Image" style="height:80px;"></a></div>
                        <div class="col-md-2 col-xs-4"><a href="" class="thumbnail"><img src="https://tyd.or.tz/img/projects/1521563057.jpg" alt="Image" style="height:80px;"></a></div>
                        <div class="col-md-2 col-xs-4"><a href="" class="thumbnail"><img src="https://tyd.or.tz/img/projects/1518791268.jpg" alt="Image" style="height:80px;"></a></div>
											</div><!--.row-->
										 </div><!--.item-->

										 <div class="item">
											<div class="row">
                        <div class="col-md-2 col-xs-4"><a href="" class="thumbnail"><img src="https://3.bp.blogspot.com/-oyiuClRqAv8/W0Xul658ESI/AAAAAAAAZ7U/p_U8zaxPNSEX1WkWl97ruK1dK5rR-2vIQCLcBGAs/s1600/__800x800_59fFV.jpg" alt="Image" style="height:80px;"></a></div>
                        <div class="col-md-2 col-xs-4"><a href="http://tyd.or.tz" class="thumbnail"><img src="image/tyd.png" alt="Image" style="height:80px;"></a></div>
                        <div class="col-md-2 col-xs-4"><a href="" class="thumbnail"><img src="https://tyd.or.tz/img/projects/1521563057.jpg" alt="Image" style="height:80px;"></a></div>
                        <div class="col-md-2 col-xs-4"><a href="" class="thumbnail"><img src="https://tyd.or.tz/img/projects/1518791268.jpg" alt="Image" style="height:80px;"></a></div>
											</div>
										 </div>



			 </div>
			</div>
		 </div>
			</div>

		</div>





<script>
$(document).ready(function() {
  $('#Carousel').carousel({
      interval: 3000
  })
});
</script>

@endsection
