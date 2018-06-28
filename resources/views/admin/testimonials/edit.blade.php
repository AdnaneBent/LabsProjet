@extends('adminlte::page')

@section('title', 'Testimonial')

@section('content_header')
<h1>Modification du testimonial</h1>
@stop

  @section('content')
  <form action="{{route('testimonials.update',['testimonial'=>$testimonial->id])}}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div>
        <h5>Contenu du testimonial</h5>
        @if($errors->has('contenu'))
          <div class="text-danger">{{ $errors->first('contenu')}}</div>
        @endif
        <textarea name="contenu" for="contenu">{{old('contenu', $testimonial->contenu)}}</textarea>
        <br>
        <div class="box-body">
            <div class="form-group w-25">
                <label for="client_id"><h3>Client</h3></label>
                @if($errors->has('clients_id'))
                  <div class="text-danger">{{ $errors->first('clients_id')}}</div>
                @endif
                <select name="clients_id" id="client_id" class="w-25 form-control">
                    @foreach($clients as $client)
                      <option value="{{$client->id}}">{{$client->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-info">Enregistrer</button>
    </div><br>
    <div class="card-body">
      <a href="{{route('testimonials.index')}}" class="card-link btn btn-info">Retour</a>
    </div>
  </form>
@endsection