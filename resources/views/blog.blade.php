@extends('layouts.layout')

@section('content')
<!-- Page header -->
<div class="page-top-section">
	<div class="overlay"></div>
	<div class="container text-right">
		<div class="page-info">
			<h2>Blog</h2>
			<div class="page-links">
				<a href="#">Home</a>
				<span>Blog</span>
			</div>
		</div>
	</div>
</div>
<!-- Page header end-->


<!-- page section -->
<div class="page-section spad">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-sm-7 blog-posts">
				<!-- Post item -->
				<div class="post-item">
					<div class="post-thumbnail">
						<img src="{{asset('theme/img/blog/blog-2.jpg')}}" alt="">
						<div class="post-date">
							<h2>03</h2>
							<h3>Nov 2017</h3>
						</div>
					</div>
					<div class="post-content">
						<h2 class="post-title">Just a simple blog post</h2>
						<div class="post-meta">
							<a href="">Loredana Papp</a>
							<a href="">Design, Inspiration</a>
							<a href="">2 Comments</a>
						</div>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla.
							Phasellus vestibulum, quam tincidunt venenatis ultrices, est libero mattis ante, ac consectetur diam neque eget quam.
							Etiam feugiat augue et varius blandit. Praesent mattis, eros a sodales commodo.</p>
						<a href="blog-post.html" class="read-more">Read More</a>
					</div>
				</div>
				<!-- Post item -->
				<div class="post-item">
					<div class="post-thumbnail">
						<img src="{{asset('theme/img/blog/blog-1.jpg')}}" alt="">
						<div class="post-date">
							<h2>03</h2>
							<h3>Nov 2017</h3>
						</div>
					</div>
					<div class="post-content">
						<h2 class="post-title">Just a simple blog post</h2>
						<div class="post-meta">
							<a href="">Loredana Papp</a>
							<a href="">Design, Inspiration</a>
							<a href="">2 Comments</a>
						</div>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla.
							Phasellus vestibulum, quam tincidunt venenatis ultrices, est libero mattis ante, ac consectetur diam neque eget quam.
							Etiam feugiat augue et varius blandit. Praesent mattis, eros a sodales commodo.</p>
						<a href="blog-post.html" class="read-more">Read More</a>
					</div>
				</div>
				<!-- Post item -->
				<div class="post-item">
					<div class="post-thumbnail">
						<img src="{{asset('theme/img/blog/blog-3.jpg')}}" alt="">
						<div class="post-date">
							<h2>03</h2>
							<h3>Nov 2017</h3>
						</div>
					</div>
					<div class="post-content">
						<h2 class="post-title">Just a simple blog post</h2>
						<div class="post-meta">
							<a href="">Loredana Papp</a>
							<a href="">Design, Inspiration</a>
							<a href="">2 Comments</a>
						</div>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla.
							Phasellus vestibulum, quam tincidunt venenatis ultrices, est libero mattis ante, ac consectetur diam neque eget quam.
							Etiam feugiat augue et varius blandit. Praesent mattis, eros a sodales commodo.</p>
						<a href="blog-post.html" class="read-more">Read More</a>
					</div>
				</div>
				<!-- Pagination -->
				<div class="page-pagination">
					<a class="active" href="">01.</a>
					<a href="">02.</a>
					<a href="">03.</a>
				</div>
			</div>
			<!-- Sidebar area -->
			<div class="col-md-4 col-sm-5 sidebar">
				<!-- Single widget -->
				<div class="widget-item">
					<form action="#" class="search-form">
						<input type="text" placeholder="Search">
						<button class="search-btn">
							<i class="flaticon-026-search"></i>
						</button>
					</form>
				</div>
				<!-- Single widget -->
				<div class="widget-item">
					<h2 class="widget-title">Categories</h2>
					<ul>
						<li>
							<a href="#">Vestibulum maximus</a>
						</li>
						<li>
							<a href="#">Nisi eu lobortis pharetra</a>
						</li>
						<li>
							<a href="#">Orci quam accumsan </a>
						</li>
						<li>
							<a href="#">Auguen pharetra massa</a>
						</li>
						<li>
							<a href="#">Tellus ut nulla</a>
						</li>
						<li>
							<a href="#">Etiam egestas viverra </a>
						</li>
					</ul>
				</div>
				<!-- Single widget -->
				<div class="widget-item">
					<h2 class="widget-title">Instagram</h2>
					<ul class="instagram">
						<li>
							<img src="{{asset('theme/img/instagram/1.jpg')}}" alt="">
						</li>
						<li>
							<img src="{{asset('theme/img/instagram/2.jpg')}}" alt="">
						</li>
						<li>
							<img src="{{asset('theme/img/instagram/3.jpg')}}" alt="">
						</li>
						<li>
							<img src="{{asset('theme/img/instagram/4.jpg')}}" alt="">
						</li>
						<li>
							<img src="{{asset('theme/img/instagram/5.jpg')}}" alt="">
						</li>
						<li>
							<img src="{{asset('theme/img/instagram/6.jpg')}}" alt="">
						</li>
					</ul>
				</div>
				<!-- Single widget -->
				<div class="widget-item">
					<h2 class="widget-title">Tags</h2>
					@foreach($tags as $tag)
					<ul class="tag">
						<li>
							<a href="">{{$tag->name}}</a>
						</li>
					</ul>
					@endforeach
				</div>
				<!-- Single widget -->
				<div class="widget-item">
					<h2 class="widget-title">Quote</h2>
					@foreach($testimonials as $testimonial)
					 @if($testimonial->client != NULL)
					<!-- single testimonial -->
					<div class="testimonial">
						<span>‘​‌‘​‌</span>
						<p>{{$testimonial->contenu}}</p>
						<div class="client-info">
							<div class="avatar">
								<img src="{{Storage::disk('imgClient')->url($testimonial->client->image)}}" alt="{{$testimonial->client->name}}" alt="">
							</div>
							<div class="client-name">
								<h2>{{$testimonial->client->name}}</h2>
								<p>{{$testimonial->client->company}}</p>
							</div>
						</div>
					</div>
					@endif
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
<!-- page section end-->
@endsection