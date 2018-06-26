@extends('adminlte::page')

@section('title', 'Tag')

@section('content_header')
<h1>Création d'un Tag</h1>
@stop

  @section('content')
  <form action="{{route('tags.store')}}" method="post" enctype="multipart/form-data">
  
  @csrf
    <div>
      <label for="name">
        Nom de la catégorie :<br>
        @if($errors->has('name'))
          <div class="text-danger">{{ $errors->first('name')}}</div>
        @endif
        <input type="text" name="name" value="{{old('name')}}">
      </label><br>
      <button type="submit" class="btn btn-info">Enregistrer</button>
    </div><br>
    <div class="card-body">
      <a href="#" class="card-link"><a href="{{route('tags.index')}}"  class="btn btn-info">Retour</a>
    </div>

  </form>
@endsection