$(document).ready(pressedCodBarrasAndQtdAndCPF());


function pressedCodBarrasAndQtdAndCPF(){
    let valueCodBarrasPed = $('#CodBarrasPedido')[0].value;
    let valueQtd = $('#Quantidade')[0].value;
    let valueCpfCliente = $('#CPFCliente')[0].value;
    if(valueCodBarrasPed !== '' && valueQtd !== '' && valueCpfCliente !== ''){
        $('.salvarPedido')[0].removeAttribute('disabled');
    }else{
        $('.salvarPedido')[0].setAttribute('disabled', true);
    }
    if(valueCodBarrasPed !== ''){
        $('#CodBarrasPedido')[0].setAttribute('class', 'form-control');
    }else{
        $('#CodBarrasPedido')[0].setAttribute('class', 'form-control is-invalid');
    }
    if(valueQtd !== ''){
        $('#Quantidade')[0].setAttribute('class', 'form-control');
    }else{
        $('#Quantidade')[0].setAttribute('class', 'form-control is-invalid');    
    }
    if(valueCpfCliente !== ''){
        $('#CPFCliente')[0].setAttribute('class', 'form-control');
    }else{
        $('#CPFCliente')[0].setAttribute('class', 'form-control is-invalid');    
    }
}