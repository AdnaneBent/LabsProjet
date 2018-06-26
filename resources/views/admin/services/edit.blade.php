@extends('adminlte::page')

@section('title', 'Service')

@section('content_header')
<h1>Modification du service</h1>
@stop

  @section('content')
  <form action="{{route('services.update',['service'=>$service->id])}}" method="post" enctype="multipart/form-data">
  @method('PUT')
  @csrf
    <div>
      <label for="name">
        Nom du client<br>
        @if($errors->has('name'))
          <div class="text-danger">{{ $errors->first('name')}}</div>
        @endif
        <input type="text" name="name">
      </label><br>
      <label for="contenu">  
        <h5>Contenu :</h5>
        @if($errors->has('contenu'))
          <div class="text-danger">{{ $errors->first('contenu')}}</div>
        @endif
        <textarea name="contenu">
        </textarea>
        </label>
        <br>
      <img src="" alt="">
      <input class="pb-2" name="image" type="file"><br>
      <br>
      <button type="submit" class="btn btn-info">Enregistrer</button>
    </div>
    <div class="card-body">
      <a href="#" class="card-link"><a href="{{route('services.index')}}"  class="btn btn-info">Retour</a>
    </div>

  </form>
@endsection