@extends('adminlte::page')

@section('title', 'service')

@section('content')

<h2>Les services</h2>
<div class="container">
    <a class="btn btn-dark" href="{{route('services.create')}}">Ajouter un nouveau service</a>
</div>

<div class="text-center">
    <div class="row justify-content-around">
    @foreach($services as $service)
        <div class="card col-3 m-4" style="width: 18rem;">

            <h3>Nom du service : {{$service->name}}</h3>
            <img class="card-img-top mt-2" src="{{Storage::disk('imgService')->url($service->image)}}" alt="Card image cap">
            <div class="card-body">
                <h3>contenu : <br>{{$service->contenu}}</h3>
            </div>
            <div class="card-body">
                <a class="btn btn-primary" href="{{route('services.edit',['service'=>$service->id])}}">Edité</a>
            </div>
            <form action="{{route('services.destroy',['service'=>$service->id])}}" method="post">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
        </div>
        @endforeach
    </div>
</div>

@endsection