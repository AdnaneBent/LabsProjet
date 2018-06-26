@extends('adminlte::page')

@section('title', 'Client')

@section('content_header')
<h1>Modification du client</h1>
@stop

  @section('content')
  <form action="{{route('clients.update',['client'=>$client->id])}}" method="post" enctype="multipart/form-data">
  @method('PUT')
  @csrf
    <div>
      <label for="name">
        Nom du client<br>
        @if($errors->has('name'))
          <div class="text-danger">{{ $errors->first('name')}}</div>
        @endif
        <input type="text" name="name" value="{{old('name', $client->name)}}">
      </label><br>
      <label for="company">
        Nom de la compagnie :<br>
        @if($errors->has('company'))
          <div class="text-danger">{{ $errors->first('company')}}</div>
        @endif
        <input type="text" name="company" value="{{old('company', $client->company)}}">
      </label><br>
      <img src="" alt="">
      <input class="pb-2" name="image" type="file"><br>
      <button type="submit" class="btn btn-info">Enregistrer</button>
    </div><br>
    <div class="card-body">
      <a href="#" class="card-link"><a href="{{route('clients.index')}}"  class="btn btn-info">Retour</a>
    </div>

  </form>
@endsection