@extends('adminlte::page')

@section('title', 'Article')

@section('content')

<h2>Les articles</h2>
<div class="container">
    <a class="btn btn-dark" href="{{route('articles.create')}}">Ajouter un article</a>
</div>

<div class="text-center">
    <div class="row justify-content-around">
    @foreach($articles as $article)
    <h2>Nom de l'article : {{$article->titre}}</h2>
        <div class="card col-3 m-4" style="width: 18rem;">
            <h3>Auteur de l'article : {{$article->user->name}}</h3>
            <img class="card-img-top mt-2" src="{{Storage::disk('imgUser')->url($article->user->image)}}" alt="{{$article->user->name}}">
            <div class="card-body">
                <a class="btn btn-primary" href="{{route('articles.show',['article'=>$article->id])}}">Voir</a>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection