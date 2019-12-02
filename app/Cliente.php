<?php

namespace cruds;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model{
	
    private $error;
	public $timestamps = false;
    protected $primaryKey = 'CPF';
    public $incrementing = false;

    protected $fillable = [
        'CPF', 'NomeCliente', 'Email',
    ];

    

    public function pedidoCompras(){
    	$this->hasMany(PedidoCompras::class, 'CPF_cliente');
    }

    public function ieCamposCorretos($cliente){
        $CPFcliente = $cliente['CPF'];
        $nomeCliente = $cliente['NomeCliente'];
        $cliente = $this->find($CPFcliente);

        if(!is_null($cliente)){
            $this->setError('CPF já Cadastrado, Favor utilizar outro ou editar o mesmo');
            return false;
        }

        if(is_null($nomeCliente)){
            $this->setError('Nome do cliente vazio, Favor Preencher');
            return false;   
        }

        if(is_null($CPFcliente)){
            $this->setError('CPF Vazio, Favor Prencher');
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
