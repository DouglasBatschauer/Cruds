@extends('layouts.app')
@section('content')

@if( isset($produtos) )
<form  class="form" method="post" action="{{route('produtos.update', $produtos->CodBarras)}}" >
    {!! method_field('PUT') !!}
@else
<form  class="form" method="post" action="{{route('produtos.store')}}" >
@endif
        {{ csrf_field() }}
        <div class="form-group">
            <label for="CodBarras">Codigo de Barras</label>
            @if( isset($readOnlyPanel))
                <input name="CodBarras" type="text" readonly value="{{ $produtos->CodBarras or old('CodBarras')}}" class="form-control inputCodBarras">
            @else
            <input name="CodBarras" type="text"   value="{{ $produtos->CodBarras or old('CodBarras')}}" maxlength="20" class="form-control inputCodBarras" id="CodBarras" placeholder="Codigo de Barras do Produto" onkeyup="onKeyPressedCodBarras()"  onkeypress="return event.charCode >= 48 && event.charCode <= 57;" required>
            @endif
            <div class="invalid-feedback">
                Por favor, Digite o Codigo de Barras.
            </div>
        </div>
        <div class="form-group">
            <label for="NomeProduto">Nome Produto</label>
            @if( isset($readOnlyPanel))
                <input type="text" name="NomeProduto"  value="{{ $produtos->NomeProduto or old('CodBarras')}}" class="form-control" readonly>
            @else
                <input type="text" name="NomeProduto"  value="{{ $produtos->NomeProduto or old('CodBarras')}}" maxlength="100" class="form-control" id="NomeProduto" placeholder="Nome do Produto">
            @endif
        </div>
        <div class="form-group">
            <label for="inputPrecoProduto">Valor Produto</label>
            @if( isset($readOnlyPanel))
                <input type="text" name="ValorUnitario" class="form-control inputValorProduto" value="{{ $produtos->ValorUnitario or old('CodBarras')}}" readonly>
            @else
                <input type="text" name="ValorUnitario"  class="form-control inputValorProduto" placeholder="Valor do Produto" value="{{ $produtos->ValorUnitario or old('CodBarras')}}"  maxlength="17" onkeypress="numerico()" onkeyup="mascaraMoney()" id="inputPrecoProduto">
            @endif    
            <div class="invalid-feedback">
                Por favor, Digite o Valor do Produto
            </div>
        </div>
        @if( !isset($readOnlyPanel))
            <button class="btn btn-primary pull-right buttonCreateProduto" disabled>Salvar</button>
        @endif    
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://plentz.github.io/jquery-maskmoney/javascripts/jquery.maskMoney.min.js"></script>
    <script src="{{ asset('js/create-edit-produtos/create-edit-produtos.js') }}"></script>
@endsection()        