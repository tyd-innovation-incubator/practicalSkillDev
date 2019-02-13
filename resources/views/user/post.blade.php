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


    <!-- Blog Section -->
		<div class="section blog-single-section">
			<div class="blog-featured-section blog-featured-image">
				<img src="/image/blog-post-featured-img01.jpg" alt="blog-featured-image" class="img-responsive">
			</div> <!-- end .blog-featured-image -->
			<div class="section blog-text-content-wrapper">
				<div class="inner">
					<div class="container">
						<div class="blog-text-content">

							<div class="content-meta flex items-center no-column no-wrap">
								<div class="left-side">
									<img src="/image/avatar07.jpg" alt="post-author-image" class="img-responsive">
								</div> <!-- end .left-side -->
								<div class="right-side">
									<h1 class="dark">{{$post->Title}}</h1>
									<div class="right-side-bottom-wrapper flex items-center">
										<div class="news-meta flex no-column">
											<h6 class="publish-date">{{$post->created_at->diffForHumans()}}</h6>
										</div> <!-- end .news-meta -->
										<div class="post-tags-wrapper flex items-center no-column">
											<h6>Tags:</h6>
											<ul class="post-tags flex items-center no-column list-unstyled">
                        @foreach($post->tags as $tag)
												<li><a href="{{ route('tag',$tag)}}" class="button button-sm grey">{{$tag->name}}</a></li>
                        @endforeach

											</ul> <!-- end .post-tags -->
										</div> <!-- end .post-tags-wrapper -->
									</div> <!-- end .right-side-bottom-wrapper -->
								</div> <!-- end .right-side -->
							</div> <!-- end .blog-content-meta -->

							<div class="divider"></div>

							<div class="blog-text">
								<p>{!! htmlspecialchars_decode($post->body)!!}</p>

							</div> <!-- end .blog-text -->

							<div class="social-share-wrapper flex items-center no-wrap">
								<h6>Share this job:</h6>
								<ul class="social-share flex no-wrap no-column list-unstyled">
									<li><a href="#0" class="button button-sm facebook-btn"><span><i class="ion-social-facebook"></i></span>Facebook</a></li>
									<li><a href="#0" class="button button-sm twitter-btn"><span><i class="ion-social-twitter"></i></span>Twitter</a></li>
									<li><a href="#0" class="button button-sm g-plus-btn"><span><i class="ion-social-googleplus"></i></span>Google plus</a></li>
								</ul> <!-- end .social-share -->
							</div> <!-- end .social-share-wrapper -->
						</div> <!-- end .blog-text-content -->

						<div class="divider"></div>

						<div class="related-posts-wrapper">
							<h3>Related Posts</h3>
							<div class="news-grid">
								<div class="news-grid-row flex space-between" style="">
                  
									<div class="news-item">
										<img src="/image/news-grid01.jpg" alt="news-thumbnail" class="img-responsive">
										<div class="news-content">
											<div class="news-meta flex no-column">
												<h6><a href="#0" class="news-author">Nancy watson</a></h6>
												<h6 class="publish-date">20.02.2017</h6>
												<h6><a href="#0" class="comment-count">5 comments</a></h6>
											</div> <!-- end .news-meta -->
											<h3 class="news-title">Tips to write an impressive resume online for beginner</h3>
											<a href="#0">Read More<i class="ion-ios-arrow-thin-right"></i></a>
										</div> <!-- end .news-content -->
									</div> <!-- end .news-item -->
									<div class="news-item">
										<img src="/image/news-grid02.jpg" alt="news-thumbnail" class="img-responsive">
										<div class="news-content">
											<div class="news-meta flex no-column">
												<h6><a href="#0" class="news-author">Nancy watson</a></h6>
												<h6 class="publish-date">20.02.2017</h6>
												<h6><a href="#0" class="comment-count">5 comments</a></h6>
											</div> <!-- end .news-meta -->
											<h3 class="news-title">Let's explore 5 cool new features in JobPress theme</h3>
											<a href="#0">Read More<i class="ion-ios-arrow-thin-right"></i></a>
										</div> <!-- end .news-content -->
									</div> <!-- end .news-item -->
									<div class="news-item">
										<img src="/image/news-grid03.jpg" alt="news-thumbnail" class="img-responsive">
										<div class="news-content">
											<div class="news-meta flex no-column">
												<h6><a href="#0" class="news-author">Nancy watson</a></h6>
												<h6 class="publish-date">20.02.2017</h6>
												<h6><a href="#0" class="comment-count">5 comments</a></h6>
											</div> <!-- end .news-meta -->
											<h3 class="news-title">How to convince recuiters and get your dream job</h3>
											<a href="#0">Read More<i class="ion-ios-arrow-thin-right"></i></a>
										</div> <!-- end .news-content -->
									</div> <!-- end .news-item -->
								</div>  <!-- end .news-grid-row -->
							</div> <!-- end .news-grid -->
						</div> <!-- end .related-post-wrapper -->

						<div class="comment-section-wrapper flex no-wrap">
							<div class="left-side-wrapper">
								<h3>There are 5 comment son this post</h3>
								<div class="comment-wrapper">
									<div class="comment-wrapper-inner flex no-column no-wrap">
										<div class="left-side">
											<img src="/image/avatar08.jpg" alt="comment-image" class="img-responsive">
										</div> <!-- end .left-side -->
										<div class="right-side">
											<h4 class="dark">Roy Fisher</h4>
											<p>Cras eu risus urna. Duis lorem sapien, congue eget nisl sit amet, rutrum faucibus elit. Nullam non tortor massa. Proin ligula leo, hendrerit quis tincidunt a, sodales eget ligula.</p>
											<div class="comment-meta flex items-center no-wrap no-column">
												<h6>44 minutes ago</h6>
												<h6><a href="#0">Reply</a></h6>
											</div> <!-- end .comment-meta -->
										</div> <!-- end.right-side -->
									</div> <!-- end .comment-wrapper-inner -->
									<div class="comment-wrapper sub-comment">
										<div class="comment-wrapper-inner flex no-column no-wrap">
											<div class="left-side">
												<img src="/image/avatar07.jpg" alt="comment-image" class="img-responsive">
											</div> <!-- end .left-side -->
											<div class="right-side">
												<h4 class="dark">Nancy Wastson</h4>
												<p>Suspendisse gravida elementum lacus, a malesuada tortor sollicitudin.</p>
												<div class="comment-meta flex items-center no-wrap no-column">
													<h6>44 minutes ago</h6>
													<h6><a href="#0">Reply</a></h6>
												</div> <!-- end .comment-meta -->
											</div> <!-- end.right-side -->
										</div> <!-- end .comment-wrapper.inner -->
									</div> <!-- end .sub-comment-wrapper -->
								</div> <!-- end .comment-wrapper -->

								<div class="comment-wrapper">
									<div class="comment-wrapper-inner flex no-column no-wrap">
										<div class="left-side">
											<img src="/image/avatar09.jpg" alt="comment-image" class="img-responsive">
										</div> <!-- end .left-side -->
										<div class="right-side">
											<h4 class="dark">Diane Evans</h4>
											<p>Cras eu risus urna. Duis lorem sapien, congue eget nisl sit amet, rutrum faucibus elit. Nullam non tortor massa. Proin ligula leo, hendrerit quis tincidunt a, sodales eget ligula.</p>
											<div class="comment-meta flex items-center no-wrap no-column">
												<h6>44 minutes ago</h6>
												<h6><a href="#0">Reply</a></h6>
											</div> <!-- end .comment-meta -->
										</div> <!-- end.right-side -->
									</div> <!-- end .comment-wrapper-inner -->
								</div> <!-- end .comment-wrapper -->

								<div class="comment-wrapper">
									<div class="comment-wrapper-inner flex no-column no-wrap">
										<div class="left-side">
											<img src="/image/avatar10.jpg" alt="comment-image" class="img-responsive">
										</div> <!-- end .left-side -->
										<div class="right-side">
											<h4 class="dark">Amy Harper</h4>
											<p>Suspendisse gravida elementum lacus, a malesuada tortor sollicitudin.</p>
											<div class="comment-meta flex items-center no-wrap no-column">
												<h6>44 minutes ago</h6>
												<h6><a href="#0">Reply</a></h6>
											</div> <!-- end .comment-meta -->
										</div> <!-- end.right-side -->
									</div> <!-- end .comment-wrapper-inner -->
								</div> <!-- end .comment-wrapper -->

							</div> <!-- end .left-side-wrapper -->

							<div class="right-side-wrapper">
								<h3>Leave a comment</h3>
								<form action="http://jobpress.icookcode.net/dev/submit" id="comment-form" class="comment-form">
									<div class="form-group">
										<input type="email" class="form-control" id="commentor-name" placeholder="Enter your name">
									</div> <!-- end .form-group -->

									<div class="form-group">
										<input type="email" class="form-control" id="commentor-email" placeholder="Enter your email">
									</div> <!-- end .form-group -->

									<div class="form-group">
										<input type="text" class="form-control" id="commentor-subject" placeholder="Subject (optional)">
									</div> <!-- end .form-group -->

									<div class="form-group">
										<textarea class="form-control" rows="4" placeholder="Here goes your comment"></textarea>
									</div> <!-- end .form-group -->

									<button type="submit" class="button">Submit comment</button>
								</form> <!-- end .comment-form -->

							</div> <!-- end .right-side-wrapper -->
						</div> <!-- end .comment-section-wrapper -->
					</div> <!-- end .container -->
				</div> <!-- end .inner -->
			</div> <!-- end .blog-text-content -->
		</div> <!-- end .blog-single-section -->




	<!-- facebook comments board-->
	<div class="fb-comments" data-href="{{Request::url()}}" data-numposts="5"></div>





</div><!--end of container-->
@endsection
