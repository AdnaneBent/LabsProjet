@extends('adminlte::page')

@section('title', 'Projet')

@section('content')

<h2>Les projets</h2>
<div class="container">
    <a class="btn btn-dark" href="{{route('projets.create')}}">Ajouter un nouveau projet</a>
</div>

<div class="text-center">
    <div class="row justify-content-around">
    @foreach($projets as $projet)
        <div class="card col-3 m-4" style="width: 18rem;">

            <h3>Nom du projet : {{$projet->name}}</h3>
            <img class="card-img-top mt-2" src="{{Storage::disk('imgProjet')->url($projet->image)}}" alt="Card image cap">
            <div class="card-body">
                <h3>contenu : <br>{{$projet->contenu}}</h3>
            </div>
            <div class="card-body">
                <a class="btn btn-primary" href="{{route('projets.edit',['projet'=>$projet->id])}}">Edité</a>
            </div>
            <form action="{{route('projets.destroy',['projet'=>$projet->id])}}" method="post">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
        </div>
        @endforeach
    </div>
</div>

@endsection