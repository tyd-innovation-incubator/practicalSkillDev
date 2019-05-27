@extends('layouts.app')

@section('content')

<!-- Breadcrumb Bar -->
<div class="section breadcrumb-bar solid-blue-bg" style="background-color:green;">
  <div class="inner">
    <div class="container">
      <p class="breadcrumb-menu">
        <a href="index-2.html"><i class="ion-ios-home"></i></a>
        <i class="ion-ios-arrow-right arrow-right"></i>
        <a href="#0">Blog</a>
        <i class="ion-ios-arrow-right arrow-right"></i>
        <a href="#0">Blog List</a>
      </p> <!-- end .breabdcrumb-menu -->
      <h2 class="breadcrumb-title">Blog List</h2>
    </div> <!-- end .container -->
  </div> <!-- end .inner -->
</div> <!-- end .section -->

<!-- Blog Section -->
<div class="section blog-list-section">
  <div class="inner">
    <div class="container">

      <div class="blog-posts-wrapper flex space-between no-wrap">
        <div class="blog-left-side">
          @foreach($posts as $post)

          <div class="blog-list flex no-wrap">
            <div class="left-side">
              <img src="/image/blog-post-img-xs01.jpg" alt="blog-post-featured-img" class="img-responsive">
            </div> <!-- end .left-side -->
            <div class="right-side">
              <h2 class="dark">{{$post->Title}}</h2>
              <div class="news-meta flex no-column">
                <h6 class="publish-date">{{$post->created_at->diffForHumans()}}</h6>
              </div> <!-- end .news-meta -->
              <p>{{$post->subtitle}}</p>
            <a href="{{ route('post',$post->slug)}}"><button type="button" class="button">Read More</button></a>
            </div> <!-- end .right-side -->
          </div> <!-- end .blog-list -->
@endforeach

          <div class="jobpress-custom-pager list-unstyled flex space-between no-column items-center">
            <a href="#0" class="button"><i class="ion-ios-arrow-left"></i>Prev</a>
            <ul class="list-unstyled flex no-column items-center">
              <li class="next">
          			{{$posts->links()}}
          		</li>
            </ul>
            <a href="#0" class="button">Next<i class="ion-ios-arrow-right"></i></a>
          </div> <!-- end .jobpress-custom-pager -->

        </div> <!-- end .blog-list-wrapper -->

        <div class="blog-sidebar">

          <div class="search-widget blog-widget">
            <h6>Search this site</h6>
                    <div class="input-group search-form">
                        <input type="text" class="form-control"  placeholder="Enter your keyword" >
                        <button type="submit"><span><i class="ion-ios-search"></i></span></button>
                    </div>
          </div> <!-- end .search-widget -->

          <div class="recent-posts-widget blog-widget">
            <h6>Recent Posts</h6>
@foreach($posts as $post)
            <div class="recent-post flex items-center no-column no-wrap">
              <img src="/image/recent-post01.jpg" alt="recent-post-img" class="img-responsive">
              <h4><a href="#0">{{$post->Title}}</a></h4>
            </div> <!-- end .recent-post -->
@endforeach
          </div> <!-- end .recent-posts-widget -->

          <div class="blog-category-widget blog-widget">
            <h6>Categories</h6>
            <ul class="blog-categories list-unstyled">
              @foreach($post->categories as $category)
              <li><a href="{{ route('category',$category)}}">{{$category->name}}</a></li>

              @endforeach
            </ul>
          </div> <!-- end .blog-category-widget -->

          <div class="blog-tags-widget blog-widget">
            <h6>Tags</h6>
            <ul class="blog-tags flex no-column list-unstyled">
              @foreach($post->tags as $tag)
              <li><a href="{{ route('tag',$tag)}}" class="button button-xs grey">   {{$tag->name}}
</a></li>

              @endforeach
            </ul>
          </div> <!-- end .blog-tags-widget -->

          <div class="blog-archives-widget blog-widget">
            <h6>Arhives</h6>
            <ul class="blog-archives list-unstyled">
              <li><a href="#">October 2016<span>28 posts</span></a></li>
              <li><a href="#">September 2016<span>35 posts</span></a></li>
              <li><a href="#">August 2016<span>19 posts</span></a></li>
              <li><a href="#">July 2016<span>23 posts</span></a></li>
              <li><a href="#">June 2016<span>29 posts</span></a></li>
              <li><a href="#">May 2016<span>16 posts</span></a></li>
              <li><a href="#">April<span>14 posts</span></a></li>
            </ul>
          </div> <!-- end .blog-archives-widget -->

        </div> <!-- end .blog-sidebar -->
      </div> <!-- end .blog-posts-wrapper -->

    </div> <!-- end .container -->
  </div> <!-- end .inner -->
</div> <!-- end .section -->

@endsection
