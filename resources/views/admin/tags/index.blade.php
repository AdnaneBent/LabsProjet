@extends('adminlte::page')

@section('title', 'Tag')

@section('content')

<h2>Les tags</h2>
<div class="container">
    <a class="btn btn-dark" href="{{route('tags.create')}}">Ajouter un nouveau tag</a>
</div>

<div class="text-center">
    <div class="row justify-content-around">
    @foreach($tags as $tag)
        <div class="card col-3 m-4" style="width: 18rem;">
            <h3>{{$tag->name}}</h3>
            <div class="card-body">
                <a class="btn btn-primary" href="{{route('tags.edit',['tag'=>$tag->id])}}">Edité</a>
            </div>
            <form action="{{route('tags.destroy',['tag'=>$tag->id])}}" method="post">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
        </div>
        @endforeach
    </div>
</div>
@endsection