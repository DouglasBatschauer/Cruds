@extends('layouts.app')
@section('content')


@if( isset($error))
    <div class="alert alert-danger">
        <p>{{ $error }}</p>
    </div>   
@endif

@if( isset($pedidosCompras) )
    <form class="formCliente" method="POST" action="{{ route('pedido-compras.update', $pedidosCompras-> NumeroPedido)}}">
      {!! method_field('PUT') !!}
  @else
    <form class="formCliente" method="POST" action="{{ route('pedido-compras.store')}}">
  @endif  
    {{ csrf_field() }}
    <div class="form-group">
      <label for="CodBarrasPedido">Codigo de Barras</label>
      <input type="text" name="CodBarras" onkeyup="pressedCodBarrasAndQtdAndCPF()" onkeypress="return event.charCode >= 48 && event.charCode <= 57;" maxlength="20" value="{{ $pedidosCompras->CodBarras or old('CodBarras')}}" 
      class="form-control" id="CodBarrasPedido" placeholder="Digite o Codigo de barras">
      <div class="invalid-feedback">
        Por favor, Digite o Codigo de Barras
      </div>
    </div>
    <div class="form-group">
      <label for="Quantidade">Quantidade</label>
      <input type="text" onkeyup="pressedCodBarrasAndQtdAndCPF()" name="Quantidade" maxlength="100" value="{{ $pedidosCompras->Quantidade or old('Quantidade')}}" onkeypress="return event.charCode >= 48 && event.charCode <= 57;" class="form-control" id="Quantidade" placeholder="Digite a quantidade">
      <div class="invalid-feedback">
        Por favor, Digite a quantidade de Produtos
      </div>
    </div>
    <div class="form-group">
      <label for="CPFCliente">CPF do Cliente</label>
      <input type="text" name="CPF_cliente" onkeyup="pressedCodBarrasAndQtdAndCPF()" maxlength="11" value="{{ $pedidosCompras->CPF_cliente or old('CPF_cliente')}}" onkeypress="return event.charCode >= 48 && event.charCode <= 57;" class="form-control" id="CPFCliente" placeholder="Digite o CPF do cliente">
      <div class="invalid-feedback">
        Por favor, Digite o CPF do cliente
      </div>
    </div>
    <button type="submit"  disabled class="btn btn-primary salvarPedido">Salvar</button>
  </form>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="{{ asset('js/create-edit-pedidos/create-edit-pedidos.js') }}"></script>

@endsection()