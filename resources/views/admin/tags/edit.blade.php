@extends('adminlte::page')

@section('title', 'Tag')

@section('content_header')
<h1>Modification du tag</h1>
@stop

  @section('content')
  <form action="{{route('tags.update',['tag'=>$tag->id])}}" method="post">
      @csrf
      @method('PUT')
    <div>
      
      <label for="name">
        Nom du tag :
        <br>
        @if($errors->has('name'))
          <div class="text-danger">{{ $errors->first('name')}}</div>
        @endif
        <input type="text" name="name" value="{{old('name', $tag->name)}}">
      </label><br>
      <button type="submit" class="btn btn-info">Enregistrer</button>
    </div><br>
    <div class="card-body">
      <a href="{{route('tags.index')}}"  class="btn btn-info">Retour</a>
    </div>
  </form>
@endsection