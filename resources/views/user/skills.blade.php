@extends('layouts.app')

@section('content')


<div class="context-dark" >
		<section class="breadcrumb-modern rd-parallax bg-gray-darkest">
			<div data-speed="0.2" data-type="media" data-url="http://www.powerjob.in/images/background-02-1920x870.jpg" class="rd-parallax-layer"></div>
			<div data-speed="0" data-type="html" class="rd-parallax-layer">
				<div class="bg-overlay-gray-darkest">
					<div class="shell section-top-98 section-bottom-34 section-md-bottom-66 section-md-98 section-lg-top-155 section-lg-bottom-66">
						<div class="text-extra-big text-bold veil reveal-md-block">Impontant Skills</div>
					</div>
				</div>
			</div>
		</section>
	</div>
<div class="container">

<!--pactical-introduction-->
  <div class="practical-introduction" style="margin-top:30px;" >
    <div class="row" style="margin-bottom:30px; margin-top:30px;">
			@foreach($posts as $post)
			<div class="col-md-4">
				<div class="flex-mid-container direction--column margin-top-bottom--0 max-width--1024">
					<ul class="blog-roll__flex-container">
						<li class="blog-roll__article">
							<article class="blog-roll__article__inner box-shadow--heavy"   style="box-shadow: 0 4px 5px 0 rgba(0,0,0,.14),0 1px 10px 0 rgba(0,0,0,.12),0 2px 4px 0 rgba(0,0,0,.2)!important; margin-top:30px; padding:0px;">
								<div class="blog-roll__article__image-container">
									<img class="blog-roll__image" src="https://www.brightermonday.co.tz/blog/wp-content/uploads/sites/14/2018/06/control-career-300x158.png" alt="" width="300" height="150" style="object-fit: cover; height:100%; width:100%;">
								</div>
								<div class="blog-roll__article__text-container justify--flex-start align--center">
									<div class="flex-wrapper-column">
										<div class="blog-roll__date">
			{{$post->created_at->diffForHumans()}}
			</div>
			<div class="blog-roll__title">
			<a href="{{ route('post',$post->slug)}}" target="" class="blog-roll__title-link">
			{{$post->Title}}
			</a>
			</div>
			</div>
			<div class="blog-roll__read-more">
				<a href="{{ route('post',$post->slug)}}" target="" class="blog-roll__read-more-link">
			Read more
			</a>
			</div>
			</div>
			</article>
			</li>
			</ul>
			</div>
			</div>

@endforeach

  </div>
  </div>
	<ul class="pager">
		<li class="next">
			{{$posts->links()}}
		</li>
	</ul>




<div class="row" style="margin-top:80px; background-color:whitesmoke;">

  </div>


</div>


</div><!--end of container-->
@endsection
