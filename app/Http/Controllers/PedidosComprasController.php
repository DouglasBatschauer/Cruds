<?php

namespace cruds\Http\Controllers;

use Illuminate\Http\Request;
use cruds\PedidoCompras;
use Session;
use cruds\Cliente;
use cruds\Produtos;


class PedidosComprasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $pedidosCompras = PedidoCompras::orderBy('NumeroPedido')->paginate(5);
        return view('pedidosCompras.pedidos-compras', ['pedidosCompras' => $pedidosCompras]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('pedidosCompras.create-edit-pedido');
    }

    public function verProduto($id){
        $produtos = Produtos::find($id);
        $readOnlyPanel = true;
        return view('produtos.create-edit', ['produtos' => $produtos, 'readOnlyPanel' => $readOnlyPanel]);
    }

    public function verCliente($id){
        $cliente = Cliente::find($id);
        $readOnlyPanel = true;
        return view('clientes.create-edit-cliente', ['cliente' => $cliente, 'readOnlyPanel' => $readOnlyPanel]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $dataPedido = date('Y-m-d H:i:s');
        $data = [
            'DtPedido' => $dataPedido,
            'Quantidade' => $request->Quantidade,
            'CPF_cliente' => $request->CPF_cliente,
            'CodBarras' => $request->CodBarras,
        ];
        PedidoCompras::create($data);
        return redirect('/pedido-compras');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $pedidosCompras = PedidoCompras::find($id);
        return view('pedidosCompras.create-edit-pedido', ['pedidosCompras' => $pedidosCompras]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $data = $request->all();
        $produtos = PedidoCompras::find($id);
        $produtos->update($data);
        Session::flash('message', $data['CodBarras'] . ' Alterado com Sucesso!');
        return redirect('/pedido-compras');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $pedido = PedidoCompras::find($id);
        $pedido->destroy($id);
        Session::flash('message', $pedido['CodBarras'] . ' Deletado com Sucesso!');
        return redirect('/pedido-compras');
    }
}
