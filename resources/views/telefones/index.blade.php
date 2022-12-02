@extends('layouts.telefones')

@section('content')
<div class="container">
</br>            
    <table class="table table-hover">
      <thead>
       
            
     
        <tr>
          <th>Número</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
       
    
        @foreach ($datas as $data )
        <tr>
          <td>{{$data->telefone}}</td>
       
          <td>
            <a href="{{route('telefones.edit',$data->id)}}" class="btn btn-success">Editar</a>
            <a href="{{route('telefones.destroy',$data->id)}}" onclick="return confirm('Você realmente deseja apagar esse registro?');" class="btn btn-danger">Apagar</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection