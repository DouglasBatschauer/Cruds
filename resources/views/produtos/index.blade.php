@extends('layouts.app')
@section('content')

    <div class="row-lg-12 row-sm-12 col-md-12 col-12 container filtroTableDiv">    
        <div class="row-lg-12 row-xl-12 row-sm-12 row-md-12 row-12 divFiltro">
            <div class="col-lg-4 col-md-4 col-xl-4">
                <input type="text" class="form-control" onkeyup="onKeyPressFiltro()"
                id="inputFiltro" placeholder="Filtro" name ="filtroTable">
            </div>
            <div class="col-lg-4 col-md-4 col-xl-4 divButton">   
                <a class="btn btn-primary"  href="{{url("/produtos/create")}}">
                    Adicionar novo Produto
                </a>  
            </div>    
        </div>
    </div>
    <div class="col-lg-12 col-sm-12 col-md-12 col-12">
        <table class="table table-striped table-responsive-sm table-hover" id="tablesCruds" >
            <thead class="thead-light">
                <tr>
                    <th  cope="row"><a>Codigo de Barras</a></th>
                    <th  cope="row">Nome do Produto</th>
                    <th  cope="row">Preço</th>
                    <th  cope="row">Ações</th>
                </tr>
            </thead>
            <tbody>
            	@foreach($produtos as $produto)
	                <tr>
	                	<th scope="row" class="idProduto"> {!! $produto -> CodBarras !!}</th>
		                <td class="nmProduto">{!! $produto -> NomeProduto !!}</td>
		                <td class="valorProduto">R$ {!! number_format($produto -> ValorUnitario, 2, ',', '.') !!}</td> 
                        <td>
                            <a class="btn btn-success btn-sm" href="{{url("/produtos/{$produto->CodBarras}/edit")}}">Editar</a>
                            {!! Form::open(['CodBarras' => 'deleteForm', 'method' => 'DELETE', 'url' => 'produtos/' . $produto->CodBarras])!!}
                                {!! Form::submit('Deletar', ['class' => 'btn btn-danger btn-sm'])!!}
                            {!! Form::close()!!}
                        </td>   
                	</tr>
                @endforeach	
        	</tbody>
    	</table>
         {!! $produtos->links() !!}
 	</div>   


@endsection()        