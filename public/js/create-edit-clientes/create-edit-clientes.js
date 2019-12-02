$(document).ready(onKeyPressedCPFandNome());


function onKeyPressedCPFandNome(){
    let valueCPF = $('#CPFCliente')[0].value;
    let valueNomeCliente = $('#nmCliente')[0].value;
    if(valueCPF !== '' && valueNomeCliente !== ''){
        $('.salvarCliente')[0].removeAttribute('disabled');
    }else{
        $('.salvarCliente')[0].setAttribute('disabled', true);
    }
    if(valueCPF !== ''){
        $('#CPFCliente')[0].setAttribute('class', 'form-control');
    }else{
        $('#CPFCliente')[0].setAttribute('class', 'form-control is-invalid');
    }
    if(valueNomeCliente !== ''){
        $('#nmCliente')[0].setAttribute('class', 'form-control');
    }else{
        $('#nmCliente')[0].setAttribute('class', 'form-control is-invalid');    
    }
}