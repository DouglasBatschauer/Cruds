<?php

namespace cruds\Http\Controllers;

use Illuminate\Http\Request;
use cruds\Produtos;
use Session;

class ProdutosController extends Controller {

    private $produto;

    public function __construct(Produtos $produto) {
        $this->middleware('auth');
        $this->produto = $produto;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $produtos = $this->produto->orderBy('NomeProduto')->paginate(5);
        return view('produtos.index', ['produtos' => $produtos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('produtos.create-edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        if($this->produto->verificaCampos($request->all())){
            $precoProdutoAlterado = str_replace(['.',','], ['','.'], str_replace('R$', '', str_replace(' ', '', $request->ValorUnitario)));
            $data = [
                'CodBarras' => $request->CodBarras,
                'NomeProduto' => $request->NomeProduto,
                'ValorUnitario' => $precoProdutoAlterado,
            ];
            Produtos::create($data);
            return redirect('/produtos');   
        }
        $error = $this->produto->getError();
        return view('produtos.create-edit', ['error' => $error]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $produtos = $this->produto->find($id);
        return view('produtos.create-edit', ['produtos' => $produtos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $precoProdutoAlterado = str_replace(['.',','], ['','.'], str_replace('R$', '', str_replace(' ', '', $request->ValorUnitario)));
        $data = [
            'CodBarras' => $request->CodBarras,
            'NomeProduto' => $request->NomeProduto,
            'ValorUnitario' => $precoProdutoAlterado
        ];
        $produtos = $this->produto->find($id);
        $produtos->update($data);
        return redirect('/produtos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $produtos = $this->produto->find($id);
        $produtos->destroy($id);
        return redirect('/produtos');
    }
}
