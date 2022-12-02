@extends('layouts.contatos')

@section('content')
<div class="container">
</br>            
    <table class="table table-hover">
      <thead>
       
            
     
        <tr>
          <th>Nome</th>
          <th>Apelido</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
 
        @foreach ($contatos as $contato )
        <tr>
          <td>{{$contato->nome}}</td>
          <td>{{$contato->apelido}}</td>
          <td>
            <a href="{{route('telefones.index',$contato->id)}}" class="btn btn-success">TEL</a>
            <a href="{{route('contatos.edit',$contato->id)}}" class="btn btn-success">Editar</a>
            <a href="{{route('contatos.destroy',$contato->id)}}"onclick="return confirm('Você realmente deseja apagar esse registro?');" class="btn btn-danger">Apagar</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection