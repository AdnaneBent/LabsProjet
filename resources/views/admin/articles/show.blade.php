@extends('adminlte::page')

@section('title', 'Article')

@section('content')

<h2>Les articles</h2>

<div class="text-center">
    <div class="row justify-content-around">
        <div class="box col-9 m-4" style="width: 18rem;">
            {{-- Debut du nom de l'article --}}
            <h3>Nom de l'article : {{$article->titre}}</h3>
            {{-- Fin du nom de l'article --}}
            {{-- Image de l'article --}}
            <img class="box-header mt-2 mx-auto" src="{{Storage::disk('imgArticle')->url($article->image)}}" alt="Card image cap">
            {{-- Fin de l'image des articles --}}
            {{-- Debut du nom de l'auteur --}}
            <div class="box-body">
                <h3>Nom de l'auteur : <br>{{$article->user->name}}</h3>
            </div>
            {{-- Fin du nom de l'auteur --}}
            {{-- Image du user --}}
            <div class="box-body">
               <img class="box-img-top mt-2" src="{{Storage::disk('imgUser')->url($article->user->image)}}" alt="Box image cap">
            </div>
            {{-- Fin de l'image du user --}}
            {{-- Debut du contenu des articles --}}
            <div class="box-body">
                <h3>Contenu : <br>{{$article->contenu}}</h3>
            </div>
            {{-- Fin du contenu de l'article --}}
            {{-- Debut des cat&gories --}}
            <div class="box-body">
                <h3>Categorie : <br>{{$article->categorie->name}}</h3>
            </div>
            {{-- Fin des catégories --}}
            {{-- Debut des Tags --}}
            <div class="box-body">
                @foreach($article->tags as $tag)
                <p>{{$tag->name}}</p>
                @endforeach
            </div>
            {{-- Fin des Tags --}}
            <div class="row">
                <div class="col-6">
                    <form action="{{route('validation.update',['article'=>$article->id])}}" method="post">
                        @csrf
                        @method('PUT')
                        <input value="1" name="validation" type="hidden">
                        <button class="btn btn-success" type="submit">Valider</button>
                    </form>
                    <form action="{{route('validation.update',['article'=>$article->id])}}" method="post">
                        @csrf
                        @method('PUT')
                        <input value="2" name="validation" type="hidden">
                        <button class="btn btn-warning" type="submit">En suspend</button>
                    </form>
                    <form action="{{route('validation.update',['article'=>$article->id])}}" method="post">
                        @csrf
                        @method('PUT')
                        <input value="3" name="validation" type="hidden">
                        <button class="btn btn-danger" type="submit">Refuser</button>
                    </form>
                </div>


                <div class="col-6"><div class="box-body">
                <a class="btn btn-primary" href="{{route('articles.edit',['article'=>$article->id])}}">Edité</a>
                </div>
                <form action="{{route('articles.destroy',['article'=>$article->id])}}"method="post">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">Supprimer</button></div>
            </div>
            
        </div>
    </div>
</div>

@endsection