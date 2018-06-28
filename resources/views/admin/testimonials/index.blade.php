@extends('adminlte::page')

@section('title', 'Testimonial')

@section('content')

<h2>Les testimoniaux</h2>
<div class="container">
    <a class="btn btn-dark" href="{{route('testimonials.create')}}">Ajouter des testimoniaux</a>
</div>

<div class="text-center">
    <div class="row justify-content-around">
    @foreach($testimonials as $testimonial)
        <div class="card col-3 m-4" style="width: 18rem;">
            <h3>Nom du client : {{$testimonial->client->name}}</h3>
            <img class="card-img-top mt-2" src="{{Storage::disk('imgClient')->url($testimonial->client->image)}}" alt="{{$testimonial->client->name}}">
            <div class="card-body">
                <h3>contenu : <br>{{$testimonial->contenu}}</h3>
            </div>
            <div class="card-body">
                <a class="btn btn-primary" href="{{route('testimonials.show',['testimonial'=>$testimonial->id])}}">Voir</a>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection