<?php

namespace cruds;

use Illuminate\Database\Eloquent\Model;
use cruds\Http\Controllers\ProdutosController;

class Produtos extends Model {
	
    private $error;

    protected $fillable = [
        'CodBarras', 'NomeProduto', 'ValorUnitario',
    ];

    public $timestamps = false;
    protected $primaryKey = 'CodBarras';

    public function pedidoCompras(){
    	$this->hasMany(PedidoCompras::class, 'CodBarras');
    }

    public function verificaCampos($produto){
    	$codBarras = $produto['CodBarras'];
    	$valorProduto = $produto['ValorUnitario'];
    	$produtoEncontrado = $this->find($codBarras);
    	
    	if(!is_null($produtoEncontrado)){
            $this->setError('Codigo de Barras ja Cadastrado');
	    	return false;
    	}

    	if(is_null($codBarras)){
            $this->setError('Codigo de Barras Vazio, Favor Preencher');
    		return false;
    	}

    	if(is_null($valorProduto)){
            $this->setError('Valor do Produto Vazio, Favor Preencher');
    		return false;
    	}
    	return true;
    }

    public function getError(){
        return $this->error;
    }

    public function setError($error){
        $this->error = $error;
    }
}
