<!-- Header section -->
	<header class="header-section">
		<div class="logo">
			<img src="{{asset('theme/img/logo.png')}}" alt="">
			<!-- Logo -->
		</div>
		<!-- Navigation -->
		<div class="responsive">
			<i class="fa fa-bars"></i>
		</div>
		<nav>
			<ul class="menu-list">
				<li class="">
					<a href="{{route('welcome')}}">Home</a>
				</li>
				<li>
					<a href="{{route('services')}}">Services</a>
				</li>
				<li>
					<a href="{{route('blog')}}">Blog</a>
				</li>
				<li>
					<a href="{{route('contact')}}">Contact</a>
				</li>
				<li>
					<a href="http://127.0.0.1:8000/login">Login</a>
				</li>
			</ul>
		</nav>
	</header>
	<!-- Header section end -->