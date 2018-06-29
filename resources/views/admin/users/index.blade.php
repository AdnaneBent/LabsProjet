@extends('adminlte::page')

@section('title', 'User')

@section('content')

<h2>Les users</h2>
<div class="container">
    <a class="btn btn-dark" href="{{route('users.create')}}">Ajouter un utilisateur</a>
</div>

<div class="text-center">
    <div class="row justify-content-around">
    @foreach($users as $user)
        <div class="card col-3 m-4" style="width: 18rem;">

            <h3>Nom de l'utilisateur : <br>{{$user->name}}</h3>
            <img class="card-img-top mt-2" src="{{Storage::disk('imgUser')->url($user->image)}}" alt="image">
            <div class="card-body">
                <a class="btn btn-primary" href="{{route('users.show',['user'=>$user->id])}}">Voir</a>
            </div>
            <h3>{{$user->role->name}}<br>
            <h2 class="bg-info">{{$user->poste}}</h2>
            </h3>
        </div>
        @endforeach
    </div>
</div>

@endsection