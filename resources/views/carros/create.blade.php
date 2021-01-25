@extends('master')

@section('content')
<div class="row">
 <div class="col-md-12">
  <br />
  <h3 aling="center">Adicione informações do Carro</h3>
  <br />
  @if(count($errors) > 0)
  <div class="alert alert-danger">
   <ul>
   @foreach($errors->all() as $error)
    <li>{{$error}}</li>
   @endforeach
   </ul>
  </div>
  @endif
  @if(\Session::has('success'))
  <div class="alert alert-success">
   <p>{{ \Session::get('success') }}</p>
  </div>
  @endif
    <form method="post" action="{{url('carros')}}">
    {{csrf_field()}}
    <div class="form-group">
        <input type="text" name="nome_carro" class="form-control" placeholder="Nome do carro" />
    </div>
    <div class="form-group">
        <input type="text" name="proprietario" class="form-control" placeholder="Nome do proprietario" />
    </div>
    <div class="form-group">
        <input type="text" name="placa" maxlength="7" class="form-control" pattern="[A-Za-z0-9]{7}" title="Apenas letras e números" placeholder="Nº da placa" />
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" />
    </div>    
    </form>      

 </div>
</div>
@endsection