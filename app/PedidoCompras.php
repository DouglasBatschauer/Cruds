<?php

namespace cruds;

use Illuminate\Database\Eloquent\Model;

class PedidoCompras extends Model{

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
}
