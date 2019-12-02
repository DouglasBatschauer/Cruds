<?php

namespace cruds\Http\Controllers;

use Illuminate\Http\Request;
use cruds\PedidoCompras;
use Session;
use cruds\Cliente;
use cruds\Produtos;


class PedidosComprasController extends Controller{
    
    private $pedidoCompras;
    private $cliente;
    private $produtos;

    public function __construct(PedidoCompras $pedidoCompras, Cliente $cliente, Produtos $produtos){
        $this->pedidoCompras = $pedidoCompras;
        $this->cliente = $cliente;
        $this->produtos = $produtos;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $pedidosCompras = $this->pedidoCompras->orderBy('NumeroPedido')->paginate(5);
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
        $produtos = $this->produtos->find($id);
        $readOnlyPanel = true;
        return view('produtos.create-edit', ['produtos' => $produtos, 'readOnlyPanel' => $readOnlyPanel]);
    }

    public function verCliente($id){
        $cliente = $this->cliente->find($id);
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
        if($this->pedidoCompras->ieCamposCorretos($request, $this->cliente, $this->produtos)){
            $dataPedido = date('Y-m-d H:i:s');
            $data = [
                'DtPedido' => $dataPedido,
                'Quantidade' => $request->Quantidade,
                'CPF_cliente' => $request->CPF_cliente,
                'CodBarras' => $request->CodBarras,
            ];
            $this->pedidoCompras->create($data);
            return redirect('/pedido-compras');
        }
        $error = $this->pedidoCompras->getError();
        return view('pedidosCompras.create-edit-pedido', ['error' => $error]);     
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
        $pedidosCompras = $this->pedidoCompras->find($id);
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
        if($this->pedidoCompras->ieCamposCorretos($request, $this->cliente, $this->produtos)){
            $data = $request->all();
            $produtos = $this->pedidoCompras->find($id);
            $produtos->update($data);
            return redirect('/pedido-compras');
        }   
        $error = $this->pedidoCompras->getError();
        return view('pedidosCompras.create-edit-pedido', ['error' => $error]);  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $pedido = $this->pedidoCompras->find($id);
        $pedido->destroy($id);
        return redirect('/pedido-compras');
    }
}
