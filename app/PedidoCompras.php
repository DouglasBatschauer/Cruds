<?php

namespace cruds;

use Illuminate\Database\Eloquent\Model;

class PedidoCompras extends Model{

    private $error;

    protected $fillable = [
        'NumeroPedido', 'DtPedido', 'Quantidade', 'CPF_cliente', 'CodBarras'
    ];

    protected $primaryKey = 'NumeroPedido';
    protected $table = 'pedido';
    public $timestamps = false;
    
    public function cliente(){
    	$this->belongsTo(Cliente::class, 'CPF_cliente');
    }

    public function produtos(){
    	$this->belongsTo(Produtos::class, 'CodBarras');
    }

    public function ieCamposCorretos($pedidoCompras, $cliente, $produtos){
        $CodBarras = $pedidoCompras['CodBarras'];
        $CPFCliente = $pedidoCompras['CPF_cliente'];
        $produtoFinding = $produtos->find($CodBarras);
        $clienteFinding = $cliente->find($CPFCliente);

        if(is_null($produtoFinding)){
            $this->setError('Produto não encontrado, Favor Verificar!');
            return false;
        }
        if(is_null($clienteFinding)){
            $this->setError('Cliente não encontrado, Favor Verificar!');
            return false;
        }    
        if(is_null($CodBarras)){
            $this->setError('Codigo de barras vazio, Favor Preencher!');
            return false;
        }
        if(is_null($CPFCliente)){
            $this->setError('CPF vazio, Favor Preencher!');
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
