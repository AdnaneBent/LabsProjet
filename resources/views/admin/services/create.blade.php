@extends('adminlte::page')

@section('title', 'Service')

@section('content_header')
<h1>Création du service</h1>
@stop

  @section('content')
  <form action="{{route('services.store')}}" method="post" enctype="multipart/form-data">

  @csrf
    <div>
        <label for="name">
        Nom du service :<br>
        @if($errors->has('name'))
            <div class="text-danger">{{ $errors->first('name')}}</div>
        @endif
        <input type="text" name="name" value="{{old('name')}}">
        </label><br>
        <h5>Contenu</h5>
        @if($errors->has('contenu'))
          <div class="text-danger">{{ $errors->first('contenu')}}</div>
        @endif
        <textarea class="w-25" name="contenu" for="contenu">{{old('contenu')}}</textarea>
        <br>
        @if($errors->has('image'))
            <div class="text-danger">{{ $errors->first('image')}}</div>
        @endif
        <h5>Le flaticon</h5>
        <input class="pb-2" name="image" type="text"><br>
        <button type="submit" class="btn btn-info">Enregistrer</button>
    </div><br>
    <div class="card-body">
      <a href="#" class="card-link"><a href="{{route('services.index')}}"  class="btn btn-info">Retour</a>
    </div>

  </form>
@endsection