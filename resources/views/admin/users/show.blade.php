@extends('adminlte::page')

@section('title', 'User')

@section('content')
<div class="container w-25">
        <div class="card mb-3 text-center">
            <img class="card-img-top mt-2" src="{{Storage::disk('imgUser')->url($user->image)}}" alt="{{$user->role->name}}">
            <div class="card-body"></div>
        <div class="card-body">
            <h3>Nom d'utilisateur : {{$user->name}}</h3>
            <h3>Poste : {{$user->poste}}</h3>
            <p class="card-text">{{$user->email}}</p>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="card-body">
                    <a href="#" class="card-link"><a href="{{route('users.index')}}"  class="btn btn-info">Retour</a>
                </div>
            </div>
            <div class="col-6">
                    <div class="card-body">
                        <a class="btn btn-primary" href="{{route('users.edit',['user'=>$user->id])}}">Edité</a>
                    </div>
                    <form action="{{route('users.destroy',['user'=>$user->id])}}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Supprimer</button>
            </div>
        </div>
    </div>
</div>

@endsection