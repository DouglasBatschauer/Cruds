@extends('layouts.app')
@section('content')
  
  @if( isset($cliente))
    <form class="formCliente" method="POST" action="{{ route('cliente.update', $cliente->CPF)}}">
      {!! method_field('PUT') !!}
  @else
    <form class="formCliente" method="POST" action="{{ route('cliente.store')}}">
  @endif  
    {{ csrf_field() }}
    <div class="form-group">
      <label for="CPFCliente">CPF</label>
      @if( isset($readOnlyPanel))
        <input type="text" name="CPF" readonly value="{{ $cliente->CPF or old('CPF')}}" class="form-control" id="CPFCliente">
      @else
      <input type="text" name="CPF" onkeypress="return event.charCode >= 48 && event.charCode <= 57;" maxlength="11" value="{{ $cliente->CPF or old('CPF')}}" onkeyup="onKeyPressedCPFandNome()" class="form-control" id="CPFCliente" placeholder="Digite seu CPF">
      @endif
      <div class="invalid-feedback">
        Por favor, Digite o CPF do Cliente.
      </div>
    </div>
    <div class="form-group">
      <label for="nmCliente">Nome do Cliente</label>
      @if( isset($readOnlyPanel))
        <input type="text" readonly value="{{ $cliente->NomeCliente or old('NomeCliente')}}" name="NomeCliente" class="form-control">
      @else
      <input type="text" maxlength="100" value="{{ $cliente->NomeCliente or old('NomeCliente')}}" name="NomeCliente" class="form-control" onkeyup="onKeyPressedCPFandNome()" id="nmCliente" placeholder="Digite seu Nome">
      @endif
      <div class="invalid-feedback">
        Por favor, Digite o nome do Cliente.
      </div>
    </div>
    <div class="form-group">
      <label for="emailCliente">Endereço de email</label>
      @if( isset($readOnlyPanel))
        <input type="email" readonly value="{{ $cliente->Email or old('Email')}}" class="form-control">
      @else
        <input type="email" name="Email" maxlength="10" value="{{ $cliente->Email or old('Email')}}" class="form-control" id="emailCliente" aria-describedby="emailHelp" placeholder="Digite o email do cliente">
      @endif
    </div>
    @if( !isset($readOnlyPanel))
      <button type="submit" disabled class="btn btn-primary salvarCliente">Salvar</button>
    @endif 
  </form>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="{{ asset('js/create-edit-clientes/create-edit-clientes.js') }}"></script>
@endsection()