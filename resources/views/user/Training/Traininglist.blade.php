@extends('layouts.app')


@section('content')



<!-- Job Listings Section -->
<div class="section jobs-listing-section">
  <div class="container-fluid">
    <div class="jobs-listing-wrapper flex no-wrap">

      <div class="left-side">


        <div class="divider"></div>

        <div class="featured-jobs-widget-wrapper jobs-widget">
          <h6>Featured Jobs</h6>
          @foreach($training as $train)
          <div class="featured-jobs-widget">
            <div class="featured-job flex items-center no-column no-wrap">
              <div class="left-side-inner">
                <img src="/image/company-logo16.jpg" alt="company-logo" class="img-responsive">
              </div> <!-- end .left-side -->
              <div class="right-side-inner">
                <h5 class="dark">{{$train->Title}}</h5>
                <h5>{{$train->location}}</h5>
              </div> <!-- end .right-side -->
            </div> <!-- end .featured-job -->
          </div> <!-- end .featured-jobs-widget -->
          @endforeach

        </div> <!-- end .featured-jobs-widget-wrapper -->

        <div class="divider"></div>


      </div> <!-- end .left-side -->

      <div class="center-content-wrapper">

        <div class="sort-by-wrapper on-listing-page flex space-between items-center no-wrap">

          <div class="right-side-inner">
            <div class="sort-by dropdown flex no-wrap no-column items-center">
              <h6>sort by</h6>
              <button class="button dropdown-toggle" type="button" id="sort-by" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Default
                <i class="ion-ios-arrow-down"></i>
              </button>
              <ul class="dropdown-menu" aria-labelledby="sort-by">
                  <li><a href="#">Featured</a></li>
                  <li><a href="#">Top candidates</a></li>
                  <li><a href="#">Price, high to low</a></li>
                  <li><a href="#">Alphabetically, A-Z</a></li>
                  <li><a href="#">Alphabetically, Z-A</a></li>
                  <li><a href="#">Best sellers</a></li>
                </ul> <!-- end .dropdown-menu -->
            </div> <!-- end .sort-by-drop-down -->
          </div> <!-- end .right-side -->
        </div> <!-- end .sort-by-wrapper -->

            <div class="bookmarked-jobs-list-wrapper on-listing-page">
              @foreach($training as $train)

              <div class="bookmarked-job-wrapper">

                <div class="bookmarked-job flex no-wrap no-column ">
                  <div class="job-company-icon">
                    <img src="/image/company-logo-big01.jpg" alt="company-icon" class="img-responsive">
                  </div> <!-- end .job-icon -->
                  <div class="bookmarked-job-info">
                    <h4 class="dark flex no-column">{{$train->Title}}<a href="#0" class="button full-time">{{$train->Employment_type}}</a></h4>
                    <h5>{{$train->company_name}}</h5>
                    <p></p>
                    <div class="bookmarked-job-info-bottom flex space-between items-center no-column no-wrap">
                      <div class="bookmarked-job-meta flex items-center no-wrap no-column">

                    <h6 class="bookmarked-job-category">Art/Design</h6>
                        <h6 class="candidate-location"><span>{{$train->location}}</span></h6>
                    <h6 class="hourly-rate">{{$train->salary}}<span></span></h6>
                      </div> <!-- end .bookmarked-job-meta -->
                      <div class="right-side-bookmarked-job-meta flex items-center no-column no-wrap">
                        <i class="ion-ios-heart wishlist-icon" style="margin-left:20px;"></i>
                        <a href="{{route('Traininglist.show',$train->id)}}" class="button">more detail</a>
                      </div> <!-- end .right-side-bookmarked-job-meta -->
                    </div> <!-- end .bookmarked-job-info-bottom -->
                  </div> <!-- end .bookmarked-job-info -->

                </div> <!-- end .bookmarked-job -->
              </div> <!-- end .bookmarked-job-wrapper -->
  @endforeach
            </div> <!-- end .bookmarked-jobs-list-wrapper -->
            <div class="jobpress-custom-pager list-unstyled flex space-center no-column items-center">
          <a href="#0" class="button"><i class="ion-ios-arrow-left"></i>Prev</a>
          <ul class="list-unstyled flex no-column items-center">
            <li><a href="#0">1</a></li>
            <li><a href="#0">2</a></li>
            <li><a href="#0">3</a></li>
            <li><a href="#0">4</a></li>
            <li><a href="#0">5</a></li>
          </ul>
          <a href="#0" class="button">Next<i class="ion-ios-arrow-right"></i></a>
        </div> <!-- end .jobpress-custom-pager -->

      </div> <!-- end .center-content -->

      <div class="right-side">



        <div class="job-status-widget jobs-widget">
          <h6>Categories</h6>
              <ul class="job-status-wrapper list-unstyled">
                @foreach($training as $train)

                      <li class="job-status checkbox">
                          <input id="job-status-checkbox1" type="checkbox">
                          <label for="job-status-checkbox1">{{$train->Employment_type}}<span></span></label>
                      </li>
                      @endforeach


                    </ul> <!-- end .job-status-wrapper -->
        </div> <!-- end .job-status-widget -->

        <div class="job-locations-widget jobs-widget">
          <h6>Locations</h6>
              <ul class="job-locations list-unstyled">
                @foreach($training as $train)
                      <li class="job-category checkbox flex space-between items-center no-column no-wrap">
                          <input id="job-locations-checkbox1" type="checkbox">
                          <label for="job-locations-checkbox1">{{$train->location}}<span></span></label>
                      </li>
@endforeach

                    </ul> <!-- end .job-locations -->
        </div> <!-- end .job-locations-widget -->

        <div class="cta-job-widget">
          <h5 class="dark">Need a Training?</h5>
          <h3 class="dark">Join our community and search for a better Training</h3>
          <a href="#0">Get started now <span><i class="ion-ios-arrow-thin-right"></i></span></a>
        </div> <!-- end .cta-job-widget -->

      </div> <!-- end .right-side -->

    </div> <!-- end .jobs-listing-wrapper -->
  </div> <!-- end .container-fluid -->
</div> <!-- end .section -->




<script>
$(document).ready(function() {
  $('#Carousel').carousel({
      interval: 3000
  })
});
</script>

@endsection
