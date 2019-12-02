<?php

namespace cruds;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model{
	
	public $timestamps = false;
    protected $primaryKey = 'CPF';
    public $incrementing = false;

    protected $fillable = [
        'CPF', 'NomeCliente', 'Email',
    ];

    

    public function pedidoCompras(){
    	$this->hasMany(PedidoCompras::class, 'CPF_cliente');
    }
}
