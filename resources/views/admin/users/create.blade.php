@extends('adminlte::page')

@section('title', 'User')

@section('content_header')
<h1>Création d'un utilisateur'</h1>
@stop

  @section('content')
  <form action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
  @method('POST')
  @csrf
    <div>
      <label for="name">
        Nom :<br>
        @if($errors->has('name'))
          <div class="text-danger">{{ $errors->first('name')}}</div>
        @endif
        <input type="text" name="name" value="{{old('name')}}">
      </label><br>
      <label for="email">
        Email :<br>
        @if($errors->has('email'))
          <div class="text-danger">{{ $errors->first('email')}}</div>
        @endif
        <input type="text" name="email" value="{{old('email')}}">
      </label><br>
      <label for="email">
        Password:<br>
        @if($errors->has('password'))
          <div class="text-danger">{{ $errors->first('password')}}</div>
        @endif
        <input type="text" name="password"">
      </label><br>
      <label for="poste">
        Poste:<br>
        @if($errors->has('poste'))
          <div class="text-danger">{{ $errors->first('poste')}}</div>
        @endif
        <input type="text" name="poste" value="{{old('poste')}}">
      </label><br>
        <div class="form-group w-25">
        <label for="role_id">Role :</label>
        <select name="roles_id1" id="role_id" class="w-50 form-control">
            @foreach($roles as $role)
            <option value="{{$role->id}}">{{$role->name}}</option>
            @endforeach
        </select>
        </div><br>
      <img src="" alt="">
      <input class="pb-2" name="image" type="file"><br>
      @if($errors->has('image'))
        <div class="text-danger">{{ $errors->first('image')}}</div>
      @endif
      <button type="submit" class="btn btn-info">Enregistrer</button>
    </div><br>
    <div class="card-body">
      <a href="#" class="card-link"><a href="{{route('users.index')}}"  class="btn btn-info">Retour</a>
    </div>

  </form>
@endsection