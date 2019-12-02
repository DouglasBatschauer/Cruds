<?php

namespace cruds\Http\Controllers;

use Illuminate\Http\Request;
use cruds\Produtos;

class HomeController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $produtos = Produtos::orderBy('NomeProduto')->get();
        return view('produtos.index', ['produtos' => $produtos]);
    }
}
