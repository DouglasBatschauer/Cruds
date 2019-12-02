<?php

namespace cruds;

use Illuminate\Database\Eloquent\Model;
use cruds\Http\Controllers\ProdutosController;

class Produtos extends Model {
	
    protected $fillable = [
        'CodBarras', 'NomeProduto', 'ValorUnitario',
    ];

    public $timestamps = false;
    protected $primaryKey = 'CodBarras';

    public function pedidoCompras(){
    	$this->hasMany(PedidoCompras::class, 'CodBarras');
    }
}
