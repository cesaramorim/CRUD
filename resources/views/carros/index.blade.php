@extends('master')

@section('content')

<div class="row">
 <div class="col-md-12">
  <br />
  <h3 align="center">Informações do Carro</h3>
  <br />
  @if($message = Session::get('success'))
  <div class="alert alert-success">
   <p>{{$message}}</p>
  </div>
  @endif
  <table class="table table-bordered table-striped">
   <tr>
    <th>Nome do Carro</th>
    <th>Proprietario</th>
    <th>Placa</th>
    <th>Editar</th>
    <th>Deletar</th>
   </tr>
   @foreach($carros as $row)
   <tr>
    <td>{{$row['nome_carro']}}</td>
    <td>{{$row['proprietario']}}</td>
    <td>{{$row['placa']}}</td>
    <td><a href="{{action('App\Http\Controllers\CarrosController@edit', $row['id'])}}" class="btn btn-warning">Editar</a></td>
    <td> 
        <form method="post" class="delete_form" action="{{action('App\Http\Controllers\CarrosController@destroy', $row['id'])}}">
        {{csrf_field()}}
            <input type="hidden" name="_method" value="DELETE" />
                <button type="submit" class="btn btn-danger">Deletar</button>
        </form>
    </td>
   </tr>
   @endforeach
  </table>
 </div>
</div>
<script>
    $(document).ready(function(){
     $('.delete_form').on('submit', function(){
      if(confirm("Confirmar exclusão?"))
      {
       return true;
      }
      else
      {
       return false;
      }
     });
    });
</script>

@endsection