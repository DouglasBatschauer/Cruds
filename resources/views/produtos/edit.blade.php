@extends('layouts.app')
@section('content')

    {!! Form::open(['CodBarras' => 'dataForm', 'method' => 'PATCH' ,'url' => '/produtos/' . $produtos->CodBarras]) !!}

    <div class="form-group">
        {!! Form::label('CodBarras', 'Codigo de Barras') !!}
        {!! Form::text('CodBarras', $produtos->CodBarras, ['placeholder' => 'Codigo de Barras do Produto', 'class' => 'form-control is-invalid inputCodBarras', 'maxlength' => '20','onkeyup' => 'onKeyPressedCodBarras()', 'required', 'onkeypress' => 'return event.charCode >= 48 && event.charCode <= 57']) !!}
    </div>    

    <div class="form-group">
        {!! Form::label('NomeProduto', 'Nome Produto') !!}
        {!! Form::text('NomeProduto', $produtos->NomeProduto, ['placeholder' => 'Nome do Produto', 'class' => 'form-control']) !!}
    </div>    

    <div class="form-group">
        {!! Form::label('ValorUnitario', 'Valor Produto') !!}
        {!! Form::number('ValorUnitario', $produtos->ValorUnitario, ['placeholder' => 'Valor do Produto', 'class' => 'form-control']) !!}
    </div>
    {!! Form::submit('Alterar', ['Class' => 'btn btn-primary pull-right']) !!}

    {!! Form::close() !!}
@endsection()        