@extends('layouts.app')
@section('content')

<div class="row-lg-12 row-sm-12 col-md-12 col-12 container filtroTableDiv">    
    <div class="row-lg-12 row-xl-12 row-sm-12 row-md-12 row-12 divFiltro">
        <div class="col-lg-4 col-md-4">
            <input type="text" class="form-control" onkeyup="onKeyPressFiltro()"
            id="inputFiltro" placeholder="Filtro" name ="filtroTable">
        </div>
        <div class="col-lg-4 col-md-4 divButton">   
            <a class="btn btn-primary"  href="{{url("/cliente/create")}}">
                Adicionar novo Cliente
            </a>
        </div>    
    </div>
    </div>
    <div class="col-lg-12 col-sm-2 col-md-12 col-12 text-align-center">
        <table class="table table-striped table-responsive-sm table-hover" id="tablesCruds" >
            <thead class="thead-light">
                <tr>
                    <th  cope="row"><a>CPF</a></th>
                    <th  cope="row">Nome do Cliente</th>
                    <th  cope="row">Email</th>
                    <th  cope="row">Ações</th>
                </tr>
            </thead>
            <tbody>
            	@foreach($cliente as $clientes)
	                <tr>
	                	<th scope="row" class="idCliente">{!!$clientes->CPF!!}</th>
		                <td class="nmCliente">{!! $clientes -> NomeCliente !!}</td>
		                <td class="emailcliente">{!! $clientes -> Email !!}</td> 
                        <td>
                            <a class="btn btn-success btn-sm" href="{{url("/cliente/{$clientes->CPF}/edit")}}">Editar</a>
                            {!! Form::open(['CPF' => 'deleteForm', 'method' => 'DELETE', 'url' => 'cliente/' . $clientes->CPF])!!}
                                {!! Form::submit('Deletar', ['class' => 'btn btn-danger btn-sm'])!!}
                            {!! Form::close()!!}
                        </td> 
                	</tr>
                @endforeach	
        	</tbody>
    	</table>
         {!! $cliente->links() !!}
</div>


@endsection()
