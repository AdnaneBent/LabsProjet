<!-- newsletter section -->
<div class="newsletter-section spad">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<h2>Newsletter</h2>
			</div>
			<div class="col-md-9">
				<!-- newsletter form -->
				<form action="{{route('newsletterMail')}}" class="nl-form" method="POST">
					@method("POST")
					@csrf
					@if($errors->has('newsemail'))
          			<div class="text-danger">{{ $errors->first('newsemail')}}</div>
        			@endif
					<input type="text" name="newsemail" placeholder="Ton email ici !">
					<button type="submit" class="site-btn btn-2">Newsletter</button>
				</form>
			</div>
		</div>
	</div>
</div>