@extends('adminlte::page')

@section('title', 'Client')

@section('content_header')
<h1>Création du client</h1>
@stop

  @section('content')
  <form action="{{route('clients.store')}}" method="post" enctype="multipart/form-data">
  @method('POST')
  @csrf
    <div>
      <label for="name">
        Nom du client :<br>
        @if($errors->has('name'))
          <div class="text-danger">{{ $errors->first('name')}}</div>
        @endif
        <input type="text" name="name" value="{{old('name')}}">
      </label><br>
      <label for="company">
        Nom de la compagnie :<br>
        @if($errors->has('company'))
          <div class="text-danger">{{ $errors->first('company')}}</div>
        @endif
        <input type="text" name="company" value="{{old('company')}}">
      </label><br>
      <img src="" alt="">
      <input class="pb-2" name="image" type="file"><br>
      @if($errors->has('image'))
        <div class="text-danger">{{ $errors->first('image')}}</div>
      @endif
      <button type="submit" class="btn btn-info">Enregistrer</button>
    </div><br>
    <div class="card-body">
      <a href="#" class="card-link"><a href="{{route('clients.index')}}"  class="btn btn-info">Retour</a>
    </div>

  </form>
@endsection