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

<div class="context-dark" >
		<section class="breadcrumb-modern rd-parallax bg-gray-darkest">
			<div data-speed="0.2" data-type="media" data-url="http://www.powerjob.in/images/background-02-1920x870.jpg" class="rd-parallax-layer"></div>
			<div data-speed="0" data-type="html" class="rd-parallax-layer">
				<div class="bg-overlay-gray-darkest">
					<div class="shell section-top-98 section-bottom-34 section-md-bottom-66 section-md-98 section-lg-top-155 section-lg-bottom-66">
						<div class="text-extra-big text-bold veil reveal-md-block">{{$post->Title}}</div>
            <div class="text-extra-small text-bold veil reveal-md-block" style="font-size:3.0em;">{{$post->subtitle}}</div>


					</div>
				</div>
			</div>
		</section>
	</div>
<div class="container">

<!--pactical-introduction-->
  <div class="practical-introduction" style="margin-top:30px;" >
    <div class="row" style="margin-bottom:30px;">
<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

  <small  class="text-extra-smal text-bold pull-left"  style="font-size:1.0em;">Create at {{ $post->created_at->diffForHumans()}}</small>
  @foreach($post->categories as $category)
<a href="{{ route('category',$category)}}">
  <small  class="text-extra-smal text-bold pull-right"  style="font-size:1.0em; margin-right:20px;">
   {{$category->name}}
  </small>

</a>
@endforeach

{!! htmlspecialchars_decode($post->body)!!}
<h4 class="text-extra-smal text-bold pull-left" style="font-size:1.0em; margin-right:20px;">TAGS CLOUDS</h4>
  @foreach($post->tags as $tag)
  <a href="{{ route('tag',$tag)}}">
  <small  class="text-extra-smal text-bold pull-left"  style="border-radius:5px; border:1px solid gray; padding:5px;font-size:1.0em; margin-right:20px;">
   {{$tag->name}}
  </small>
  </a>
  @endforeach

</div>
    </div>


  </div><!--end of practical introduction -->
	<div class="row" style="margin-top:80px; background-color:whitesmoke;">

	  </div>

	<!-- facebook comments board-->
	<div class="fb-comments" data-href="{{Request::url()}}" data-numposts="5"></div>



</div>


</div><!--end of container-->
@endsection
