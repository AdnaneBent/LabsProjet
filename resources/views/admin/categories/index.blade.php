@extends('adminlte::page')

@section('title', 'categorie')

@section('content')

<h2>Les catégories</h2>
<div class="container">
    <a class="btn btn-dark" href="{{route('categories.create')}}">Ajouter une nouvelle categorie</a>
</div>

<div class="text-center">
    <div class="row justify-content-around">
    @foreach($categories as $categorie)
        <div class="card col-3 m-4" style="width: 18rem;">
            <h3>{{$categorie->name}}</h3>
            <div class="card-body">
                <a class="btn btn-primary" href="{{route('categories.edit',['categorie'=>$categorie->id])}}">Edité</a>
            </div>
            <form action="{{route('categories.destroy',['categorie'=>$categorie->id])}}" method="post">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
        </div>
        @endforeach
    </div>
</div>
@endsection