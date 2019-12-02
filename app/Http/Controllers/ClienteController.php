<?php

namespace cruds\Http\Controllers;

use Illuminate\Http\Request;
use cruds\Cliente;
use Session;

class ClienteController extends Controller {
    
    private $cliente;

    public function __construct(Cliente $cliente) {
        $this->cliente = $cliente;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $cliente = $this->cliente->orderBy('CPF')->paginate(5);
        return view('clientes.lista-clientes', ['cliente' => $cliente]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('clientes.create-edit-cliente');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        if($this->cliente->ieCamposCorretos($request->all())){
            $cliente = $request->all();
            $this->cliente->create($cliente);
            return redirect('/cliente');    
        }
        $error = $this->cliente->getError();
        return view('clientes.create-edit-cliente', ['error' => $error]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $cliente = $this->cliente->find($id);
        return view('clientes.create-edit-cliente', ['cliente' => $cliente]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $cliente = $this->cliente->find($id);
        $clienteUpdate = $request->all();
        $cliente->update($clienteUpdate);
        return redirect('/cliente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $cliente = $this->cliente->find($id);
        $cliente->destroy($id);
        return redirect('/cliente');
    }
}
