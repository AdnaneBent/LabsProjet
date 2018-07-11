<!-- services section -->
<div class="services-section spad">
  <div class="container">
    <div class="section-title dark">
      <h2>Get in <span>the Lab</span> and see the services</h2>
    </div>
    <div class="row">
      @foreach($services as $service)
      <!-- single service -->
      <div class="col-md-4 col-sm-6">
        <div class="service">
          <div class="icon">
            <i class="{{$service->image}}"></i>
          </div>
          <div class="service-text">
            <h2>{{$service->name}}</h2>
            <p>{{$service->contenu}}</p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    @if(Route::is('services'))
    <div>{{$services->links()}}</div>
    @endif
    @if(Route::is('welcome'))
    <div class="text-center mt60">
				<a href="{{route('services')}}#services" class="site-btn">Browse</a>
    </div>
    @endif
  </div>
</div>
<!-- services section end -->