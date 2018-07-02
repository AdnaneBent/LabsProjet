@extends('adminlte::page')

@section('title', 'Article')

@section('content_header')
<h1>Modification d'article</h1>
@stop

  @section('content')
  <form action="{{route('articles.update',['article'=>$article->id])}}" method="post" enctype="multipart/form-data">
  @method('PUT')
  @csrf
    <div class="text-center">
        <h5>Titre de l'article</h5>
        @if($errors->has('titre'))
          <div class="text-danger">{{ $errors->first('titre')}}</div>
        @endif
        <input name="titre" value="{{old('titre', $article->titre)}}" for="titre"><br>
        <br>
        <h5>Contenu de l'article</h5>
        @if($errors->has('contenu'))
          <div class="text-danger">{{ $errors->first('contenu')}}</div>
        @endif
        <textarea class="w-25" name="contenu" for="contenu">{{old('contenu',$article->contenu)}}</textarea><br>
        <br>
         <label for="categorie_id"><h3>Categorie</h3></label>
              <select name="categories_id" id="categorie_id" class="w-50 form-control mx-auto">
              @foreach($categories as $categorie)
              <option value="{{$categorie->id}}">{{$categorie->name}}</option>
              @endforeach
            </select>
        <br>
        <h5>Tags</h5>
        @if($errors->has('tags_id'))
          <div class="text-danger">{{ $errors->first('tags_id')}}</div>
        @endif
        <div class="form-check">
          @foreach($tags as $tag)
          <label class="form-check-label m-3">
            <input type="checkbox" class="form-check-input" name="tags_id[]" id="tag" value="{{$tag->id}}">
            {{$tag->name}}
          </label>
          @endforeach
        </div>
        <img src="" alt="">
        @if($errors->has('image'))
            <div class="text-danger">{{ $errors->first('image')}}</div>
        @endif
        <h5>Image</h5>
        <input class="pb-2" name="image" type="file"><br>
        <button type="submit" class="btn btn-info">Enregistrer</button>
    </div><br>
    <div class="card-body">
      <a href="#" class="card-link"><a href="{{route('articles.index')}}"  class="btn btn-info">Retour</a>
    </div>
  </form>
@endsection