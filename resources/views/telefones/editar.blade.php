@extends('layouts.telefones')

@section('content')
<form action="{{route('telefones.update')}}" method="POST">
    @csrf 
    <div class="form-group row">
      <label for="text" class="col-4 col-form-label">Número completo com DDD</label> 
      <div class="col-8">
        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <i class="fa fa-address-card"></i>
            </div>
          </div> 
          <input id="text" name="telefone" type="text" value="{{$telefone->telefone}}" class="form-control">
          <input id="text" name="id" type="hidden" value="{{$telefone->id}}" class="form-control">
        </div>
      </div>
    </div>
   
    <div class="form-group row">
      <div class="offset-4 col-8">
        <button name="submit" type="submit" class="btn btn-primary">SALVAR</button>
      </div>
    </div>
  </form>
  @endsection