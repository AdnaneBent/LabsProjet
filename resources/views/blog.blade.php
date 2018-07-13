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
				@foreach($articles as $article)
				<!-- Post item -->
				<div class="post-item">

					<div class="post-thumbnail">
						<img src="{{Storage::disk('imgArticle')->url($article->image)}}" alt="">
						<div class="post-date">
							<h2>{{$article->created_at->format('d')}}</h2>
							<h3>{{$article->created_at->format('M Y')}}</h3>
						</div>
					</div>
					<div class="post-content">
						<h2 class="post-title">{{$article->titre}}</h2>
						<div class="post-meta">
							<a >{{$article->user->name}}</a>
							<a >
									@foreach($article->tags as $tag)
									{{$tag->name}}
									@endforeach
								</a>
							<a>{{count($article->commentaires)}}</a>
						</div>
						<p>{{$description = substr($article->contenu, 0, 300)}} ...</p>
						<a href="{{route('blogShow',['article'=>$article->id])}}" class="read-more">Read More</a>
					</div>
				</div>
				@endforeach
				<!-- Pagination -->
				<div class="page-pagination">
					{{$articles->links()}}
				</div>
			</div>
			<!-- Sidebar area -->
			<div class="col-md-4 col-sm-5 sidebar">
				<!-- Single widget -->
				<div class="widget-item">
					<form action="{{route('SearchTitre')}}" class="search-form" method="GET">
						@csrf
						<input name="titre" type="text" placeholder="Search">
						<button class="search-btn">
							<i class="flaticon-026-search"></i>
						</button>
					</form>
				</div>
				<!-- Single widget -->
				<div class="widget-item">
					<h2 class="widget-title">Categories</h2>
					<ul>
						@foreach($categories as $categorie)
						<li>
							<a href="{{route('SearchCat',['categorie'=>$categorie->id])}}">{{$categorie->name}}</a>
						</li>
						@endforeach
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
							<a href="{{route('SearchTag',['tag'=>$tag->id])}}">{{$tag->name}}</a>
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
@include('partials.newsletter')

@endsection
