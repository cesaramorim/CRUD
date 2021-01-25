@extends('master')

@section('content')

<div class="row">
 <div class="col-md-12">
  <br />
  <h3>Editar informações</h3>
  <br />
  @if(count($errors) > 0)

  <div class="alert alert-danger">
         <ul>
         @foreach($errors->all() as $error)
          <li>{{$error}}</li>
         @endforeach
         </ul>
  @endif
  <form method="post" action="{{action('App\Http\Controllers\CarrosController@update', $id)}}">
   {{csrf_field()}}
   <input type="hidden" name="_method" value="PATCH" />
   <div class="form-group">
    <input type="text" name="nome_carro" class="form-control" value="{{$carros->nome_carro}}" placeholder="Digite o nome do carro" />
   </div>
   <div class="form-group">
    <input type="text" name="proprietario" class="form-control" value="{{$carros->proprietario}}" placeholder="Digite o nome do proprietario" />
   </div>
   <div class="form-group">
    <input type="text" name="placa" class="form-control" value="{{$carros->placa}}" placeholder="Digite o nome da placa" />
   </div>
   <div class="form-group">
    <input type="submit" class="btn btn-primary" value="Editar" />
   </div>
  </form>
 </div>
</div>
</div>

@endsection