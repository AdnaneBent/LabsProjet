@extends('adminlte::page')

@section('title', 'Commentaire')

@section('content')

<h2>Les commentaires</h2>

<div class="text-center">
    <div class="row justify-content-around">
    @foreach($commentaires as $commentaire)
        <div class="card col-3 m-4" style="width: 18rem;">

            <h3>contenu des commentaires : {{$commentaire->contenu}}</h3>
        <h2><i class="{{$commentaire->clients_id}}"></i></h2>
            <div class="card-body">
                <h3>Auteur du commentaire <br>{{$commentaire->name}}</h3>
            </div>
            <div class="card-body">
                <a class="btn btn-primary" href="{{route('commentaires.edit',[''=>$commentaire->id])}}">Edité</a>
            </div>
            <form action="{{route('commentaires.destroy',['commentaire'=>$commentaire->id])}}" method="post">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
        </div>
        @endforeach
    </div>
</div>

@endsection