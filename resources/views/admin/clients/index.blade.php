@extends('adminlte::page')

@section('title', 'client')

@section('content')

<h2>Les clients</h2>
<div class="container">
    <a class="btn btn-dark" href="{{route('clients.create')}}">Ajouter un nouveau client</a>
</div>

<div class="text-center">
    <div class="row justify-content-around">
    @foreach($clients as $client)
        <div class="card col-3 m-4" style="width: 18rem;">

            <h3>Nom du client : {{$client->name}}</h3>
            <img class="card-img-top mt-2" src="{{Storage::disk('imgClient')->url($client->image)}}" alt="Card image cap">
            <div class="card-body">
                <h3>Compagnie : {{$client->company}}</h3><br>
            </div>
            <div class="card-body">
                <a class="btn btn-primary" href="{{route('clients.edit',['client'=>$client->id])}}">Edité</a>
            </div>
            <form action="{{route('clients.destroy',['client'=>$client->id])}}" method="post">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
        </div>
        @endforeach
    </div>
</div>

@endsection