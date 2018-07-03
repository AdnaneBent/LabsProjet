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
    <div class="card col-3 m-4" style="width: 18rem;">
        
        <h3>Nom de l'article : {{$article->titre}}</h3>
        <img class="card-img-top mt-2" src="{{Storage::disk('imgArticle')->url($article->image)}}" alt="Card image cap">
        {{-- Debut du nom de l'auteur --}}
        @if($article->user != NULL)
        <div class="card-body">
            <h3>Nom de l'auteur : <br>{{$article->user->name}}</h3>
        </div>
        @endif
        {{-- Fin du nom de l'auteur --}}
        @if($article->categorie != NULL)
            {{-- Debut de la catégorie --}}
            <div class="card-body">
                <h3>Categorie : <br>{{$article->categorie->name}}</h3>
            </div>
            {{-- Fin de la catégorie --}}
            @endif
            {{-- Tag --}}
            <div class="card-body">
                @foreach($article->tags as $tag)
                <p>{{$tag->name}}</p>
                @endforeach
            </div>
            {{-- Fin de Tag --}}
            {{-- Contenu --}}
            <div class="card-body">
                <h3>Contenu : <br>{{$description = substr($article->contenu, 0, 300)}} ...</h3>
            </div>
            {{-- Fin contenu --}}
            <div class="card-body">
                <a class="btn btn-primary" href="{{route('articles.show',['article'=>$article->id])}}">Voir</a>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection