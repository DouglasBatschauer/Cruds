@extends('layouts.app')
@section('content')

<div class="row-lg-12 row-sm-12 col-md-12 col-12 container filtroTableDiv">    
    <div class="row-lg-12 row-xl-12 row-sm-12 row-md-12 row-12 divFiltro">
        <div class="col-lg-4 col-md-4">
            <input type="text" class="form-control" onkeyup="onKeyPressFiltro()"
            id="inputFiltro" placeholder="Filtro" name ="filtroTable">
        </div>
        <div class="col-lg-4 col-md-4 divButton">   
            <a class="btn btn-primary"  href="{{url("/pedido-compras/create")}}">
                Adicionar novo Pedido
            </a>   
        </div>    
    </div>
    </div>
    <div class="col-lg-12 col-sm-2 col-md-12 col-12 text-align-center">
        <table class="table table-striped table-responsive-sm table-hover" id="tablesCruds" >
            <thead class="thead-light">
                <tr>
                    <th  cope="row"><a>Numero do Pedido</a></th>
                    <th  cope="row">Data do Pedido</th>
                    <th  cope="row">Quantidade</th>
                    <th  cope="row">CPF do Cliente</th>
                    <th  cope="row">Codigo de Barras Produto</th>
                    <th  cope="row">Ações</th>
                </tr>
            </thead>
            <tbody>
            	@foreach($pedidosCompras as $pedidosCompra)
	                <tr>
	                	<th scope="row" class="nrPedido">{!!$pedidosCompra->NumeroPedido!!}</th>
		                <td class="dtPedido">{!! date("d/m/Y", strtotime($pedidosCompra -> DtPedido)) !!}</td>
		                <td class="qtdPedidos">{!! $pedidosCompra -> Quantidade !!}</td>
		                <td class="cpfCliente">{!! $pedidosCompra -> CPF_cliente !!}</td>
		                <td class="CodBarrasProduto">{!! $pedidosCompra -> CodBarras !!}</td> 
                        <td>
                            <a class="btn btn-success btn-sm" href="{{url("/pedido-compras/{$pedidosCompra->NumeroPedido}/edit")}}">Editar</a>
                            {!! Form::open(['NumeroPedido' => 'deleteForm', 'method' => 'DELETE', 'url' => 'pedido-compras/' . $pedidosCompra->NumeroPedido])!!}
                                {!! Form::submit('Deletar', ['class' => 'btn btn-danger btn-sm'])!!}
                            {!! Form::close()!!}
                            <a class="btn btn-success btn-sm" href="{{url("/pedido-compras/{$pedidosCompra->CPF_cliente}/verCliente")}}">Ver cliente</a>
                            <a class="btn btn-success btn-sm" href="{{url("/pedido-compras/{$pedidosCompra->CodBarras}/verProduto")}}">Ver Produto</a>
                        </td>
                        <td>    
                	</tr>
                @endforeach	
        	</tbody>
    	</table>
         {!! $pedidosCompras->links() !!}
</div>

@endsection()