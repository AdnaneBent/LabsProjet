@extends('adminlte::page')

@section('title', 'Article')

@section('content_header')
<h1>Création d'un article</h1>
@stop

  @section('content')
  <form action="{{route('articles.store')}}" method="post" enctype="multipart/form-data">
  @method('POST')
  @csrf
    <div>
        <h5>Titre de l'article</h5>
        @if($errors->has('titre'))
          <div class="text-danger">{{ $errors->first('titre')}}</div>
        @endif
        <input name="titre" for="titre">{{old('titre')}}</input>
        <br>
        <h5>Contenu de l'article</h5>
        @if($errors->has('contenu'))
          <div class="text-danger">{{ $errors->first('contenu')}}</div>
        @endif
        <textarea name="contenu" for="contenu">{{old('contenu')}}</textarea>
        <br>
        <img src="" alt="">
        @if($errors->has('image'))
            <div class="text-danger">{{ $errors->first('image')}}</div>
        @endif
        <input class="pb-2" name="image" type="file"><br>
        <button type="submit" class="btn btn-info">Enregistrer</button>
    </div><br>
    <div class="card-body">
      <a href="#" class="card-link"><a href="{{route('articles.index')}}"  class="btn btn-info">Retour</a>
    </div>
  </form>
@endsection