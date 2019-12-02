
$(document).ready(onKeyPressedCodBarras());


function onKeyPressedCodBarras(){
    let valueCodBarras = $('.inputCodBarras')[0].value;
    let inputValorUnitarioValue = $('#inputPrecoProduto')[0].value;
    let buttonCreateProduto = $('.buttonCreateProduto');
    if((valueCodBarras !== '') && (inputValorUnitarioValue !== '' && inputValorUnitarioValue !== '0,00')){
        buttonCreateProduto[0].removeAttribute('disabled');
    }else{
        buttonCreateProduto[0].setAttribute('disabled', true);
    }
    if(valueCodBarras !== ''){
        $('.inputCodBarras')[0].setAttribute('class', 'form-control inputCodBarras');
    }else{
        $('.inputCodBarras')[0].setAttribute('class', 'form-control is-invalid inputCodBarras');
    }
    if(inputValorUnitarioValue !== '' && inputValorUnitarioValue !== '0,00'){
        $('#inputPrecoProduto')[0].setAttribute('class', 'form-control');
    }else{
        $('#inputPrecoProduto')[0].setAttribute('class', 'form-control is-invalid');    
    }
}

function numerico() {
    return event.charCode >= 48 && event.charCode <= 57;
}

function mascaraMoney(){
    $('#inputPrecoProduto').maskMoney({
        thousands: '.',
        decimal: ','
    });
    onKeyPressedCodBarras();
}

