@extends('layouts.contatos')

@section('content')
<form action="{{route('contatos.update')}}" method="POST">
    @csrf 
    <div class="form-group row">
      <label for="text" class="col-4 col-form-label">NOME COMPLETO</label> 
      <div class="col-8">
        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <i class="fa fa-address-card"></i>
            </div>
          </div> 
          <input id="nome" name="nome" type="text"value="{{$contato->nome}}"" class="form-control" required="true">
        </div>
      </div>
    </div>
    <div class="form-group row">
      <label for="text" class="col-4 col-form-label">APELIDO</label> 
      <div class="col-8">
        <input id="apelido" name="apelido" type="text" value="{{$contato->apelido}}" class="form-control"required="true">
      </div>
    </div> 
    <div>
        <input id="id" name="id" type="hidden"value="{{$contato->id}}"" class="form-control">
    </div>
    <div class="form-group row">
      <div class="offset-4 col-8">
        <button name="submit" type="submit" class="btn btn-primary">SALVAR</button>
      </div>
    </div>
  </form>
  @endsection