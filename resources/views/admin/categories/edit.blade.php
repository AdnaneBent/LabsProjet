@extends('adminlte::page')

@section('title', 'Categorie')

@section('content_header')
<h1>Modification de la Categorie</h1>
@stop

  @section('content')
  <form action="{{route('categories.update',['categorie'=>$categorie->id])}}" method="post">
      @csrf
      @method('PUT')
    <div>
      
      <label for="name">
        Nom de le la catégorie :
        <br>
        @if($errors->has('name'))
          <div class="text-danger">{{ $errors->first('name')}}</div>
        @endif
        <input type="text" name="name">
      </label><br>
      <button type="submit" class="btn btn-info">Enregistrer</button>
    </div><br>
    <div class="card-body">
      <a href="{{route('categories.index')}}"  class="btn btn-info">Retour</a>
    </div>
  </form>
@endsection