@extends('adminlte::page')

@section('title', 'Article')

@section('content')

<h2>Les articles</h2>

<div class="text-center">
    <div class="row justify-content-around">
        <div class="card col-3 m-4" style="width: 18rem;">

            <h3>Nom de l'article : {{$article->titre}}</h3>
            <img class="card-img-top mt-2" src="{{Storage::disk('imgArticle')->url($article->image)}}" alt="Card image cap">
            <div class="card-body">
                <h3>Nom de l'auteur : <br>{{$article->user->name}}</h3>
            </div>
            <div class="card-body">
               <img class="card-img-top mt-2" src="{{Storage::disk('imgUser')->url($article->user->image)}}" alt="Card image cap">
            </div>
            <div class="card-body">
                <h3>Contenu : <br>{{$article->contenu}}</h3>
            </div>
            <div class="card-body">
                <h3>Categorie : <br>{{$article->categorie->name}}</h3>
            </div>
            <div class="card-body">
                @foreach($article->tags as $tag)
                <p>{{$tag->name}}</p>
                @endforeach
            </div>
            <div class="card-body">
                <a class="btn btn-primary" href="{{route('articles.edit',['article'=>$article->id])}}">Edité</a>
                </div>
                <form action="{{route('articles.destroy',['article'=>$article->id])}}"method="post">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">Supprimer</button>
        </div>
    </div>
</div>

@endsection