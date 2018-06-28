@extends('adminlte::page')

@section('title', 'Testimonial')

@section('content')
<div class="container w-25">
        <div class="card mb-3 text-center">
            <img class="card-img-top mt-2" src="{{Storage::disk('imgClient')->url($testimonial->client->image)}}" alt="{{$testimonial->client->name}}">
            <div class="card-body">
            <p class="card-text">{{$testimonial->contenu}}</p>
        </div>
        <div class="card-body">
            <h1>Pour :</h1><br>
            <h3>{{$testimonial->client->name}}</h3>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="card-body">
                    <a href="#" class="card-link"><a href="{{route('testimonials.index')}}"  class="btn btn-info">Retour</a>
                </div>
            </div>
            <div class="col-6">
                    <div class="card-body">
                        <a class="btn btn-primary" href="{{route('testimonials.edit',['testimonial'=>$testimonial->id])}}">Edité</a>
                    </div>
                    <form action="{{route('testimonials.destroy',['testimonial'=>$testimonial->id])}}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Supprimer</button>
            </div>
        </div>
    </div>
</div>

@endsection