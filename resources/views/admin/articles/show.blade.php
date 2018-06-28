@extends('adminlte::page')

@section('title', 'Article')

@section('content')
<div class="container">
        <div class="card-body">
            <h1>Auteur</h1><br>
            <h3>{{$article->cuser->name}}</h3>
        </div>
        <div class="card mb-3 text-center">
            <img class="card-img-top mt-2" src="{{Storage::disk('imgUser')->url($article->user->image)}}" alt="{{$article->user->name}}">
            <div class="card-body">
            <p class="card-text">{{$article->contenu}}</p>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="card-body">
                    <a href="#" class="card-link"><a href="{{route('articles.index')}}"  class="btn btn-info">Retour</a>
                </div>
            </div>
            <div class="col-6">
                    <div class="card-body">
                        <a class="btn btn-primary" href="{{route('articles.edit',['article'=>$article->id])}}">Edité</a>
                    </div>
                    <form action="{{route('articles.destroy',['article'=>$article->id])}}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Supprimer</button>
            </div>
        </div>
    </div>
</div>

@endsection