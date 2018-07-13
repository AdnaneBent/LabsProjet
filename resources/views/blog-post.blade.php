@extends('layouts.layout')
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
	<!-- page section -->
	<div class="page-section spad">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-sm-7 blog-posts">
					<!-- Single Post -->
					<div class="single-post">
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
								<a>{{$article->user->name}}</a>
								<a>
									@foreach($article->tags as $tag)
									{{$tag->name}}
									@endforeach
								</a>	
								<a>{{$article->commentaires->where('validation', 1)->count()}}</a>
							</div>
							<p>{{$article->contenu}}</p>
						</div>
						<!-- Post Author -->
						<div class="author">
							<div class="avatar">
								<img src="{{Storage::disk('imgUser')->url($article->user->image)}}" alt="">
							</div>
							<div class="author-info">
								<h2>{{$article->user->name}} <span>Author</span></h2>
								<p>Vivamus in urna eu enim porttitor consequat. Proin vitae pulvinar libero. Proin ut hendrerit metus. Aliquam erat volutpat. Donec fermen tum convallis ante eget tristique. </p>
							</div>
						</div>
						<!-- Post Comments -->
						<div class="comments">
							<h4>{{$article->commentaires->where('validation', 1)->count()}}</h4><br>
							<ul class="comment-list">
								@foreach($article->commentaires as $commentaire)
								@if($commentaire->validation == 1)
								<li>
									<div class="avatar">
										<img src="{{Storage::disk('imgUser')->url($article->user->image)}}" alt="">
									</div>
									<div class="comment-text">
										<h4>{{$commentaire->name}} | {{$commentaire->created_at->format('d M Y')}} |</h4>
										<p>{{$commentaire->contenu}}</p>
									</div>
								</li>
								@endif
								@endforeach
							</ul>
						</div>
						<!-- Commert Form -->
						<div class="row">
							<div class="col-md-9 comment-from">
								<h2>Leave a comment</h2>
								<form action="{{route('commentaire', ['articles_id'=>$article->id])}}" class="form-class" method="POST">
									@csrf
									@method('POST')
									<div class="row">
										<div class="col-sm-6">
											<input type="text" name="name" placeholder="Your name">
										</div>
										<div class="col-sm-6">
											<input type="text" name="email" placeholder="Your email">
										</div>
										<div class="col-sm-12">
											<input type="text" name="subject" placeholder="Subject">
											<textarea name="contenu" placeholder="Message"></textarea>
											<button class="site-btn">send</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- Sidebar area -->
				<div class="col-md-4 col-sm-5 sidebar">
					<!-- Single widget -->
					<div class="widget-item">
						<form action="{{route('SearchTitre')}}" class="search-form" method="GET">
							@csrf
							<input name="titre" type="text" placeholder="Search">
							<button class="search-btn"><i class="flaticon-026-search"></i></button>
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
							<p style="color:black">{{$testimonial->contenu}}</p>
							<div class="client-info">
								<div class="avatar">
									<img src="{{Storage::disk('imgClient')->url($testimonial->client->image)}}" alt="{{$testimonial->client->name}}" alt="">
								</div>
								<div class="client-name">
									<h2 style="color:black">{{$testimonial->client->name}}</h2>
									<p style="color:black">{{$testimonial->client->company}}</p>
								</div>
							</div>
						</div>
						@endif
						@endforeach
					</div>
					<!-- Single widget -->
				</div>
			</div>
		</div>
	</div>
	<!-- page section end-->


@include('partials.newsletter')
<!-- newsletter section end-->