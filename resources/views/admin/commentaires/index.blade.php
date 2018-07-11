@extends('adminlte::page')

@section('title', 'Commentaire')

@section('content')

<h2>Les commentaires</h2>

<dv class="text-center">
    <dv class="row justify-content-around">
    @foreach($commentaires as $commentaire)
        <div class="card col-3 m-4" style="width: 18rem;">
            <div>
                <h3>contenu des commentaires : {{$commentaire->contenu}}</h3>
                <h2><i class="{{$commentaire->clients_id}}"></i></h2>
                <div class="card-body">
                    <h3>Auteur du commentaire <br>{{$commentaire->name}}</h3>
                </div>
                @if($commentaire->validation == 1)
                <span class="badge badge-success">Validé</span>
                @elseif($commentaire->validation == 2)
                <span class="badge badge-warning">En suspend</span>
                @elseif($commentaire->validation == 3)
                <span class="badge badge-danger">Refusé</span>
                @endif
                <hr>
                <br>
                <div>
                    <form action="{{route('validCom.update',['commentaire'=>$commentaire->id])}}" method="post">
                        @csrf
                        @method('PUT')
                        <input value="1" name="validation" type="hidden">
                        <button class="btn btn-success" type="submit">Valider</button>
                    </form><br>
                    <form action="{{route('validCom.update',['commentaire'=>$commentaire->id])}}" method="post">
                        @csrf
                        @method('PUT')
                        <input value="2" name="validation" type="hidden">
                        <button class="btn btn-warning" type="submit">En suspend</button>
                    </form><br>
                    <form action="{{route('validCom.update',['commentaire'=>$commentaire->id])}}" method="post">
                        @csrf
                        @method('PUT')
                        <input value="3" name="validation" type="hidden">
                        <button class="btn btn-danger" type="submit">Refuser</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </dv>
</dv>

@endsection