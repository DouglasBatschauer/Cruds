function onKeyPressFiltro() {
	let input = document.getElementById('inputFiltro');
	let table = document.getElementById('tablesCruds');
	let inputValue = input.value.toUpperCase();
	let tr = table.getElementsByTagName('tr');
	let cellValue;
	let achadoValor0, achadoValor1, achadoValor2, achadoValor3, achadoValor4;
	for(let i = 0; i < tr.length; i++ ){
		let tdCol0 = tr[i].getElementsByTagName('th')[0];
		let tdCol1 = tr[i].getElementsByTagName('td')[0];
		let tdCol2 = tr[i].getElementsByTagName('td')[1];
		let tdCol3 = tr[i].getElementsByTagName('td')[2];
		let tdCol4 = tr[i].getElementsByTagName('td')[3];

		if(tdCol0){
			cellValue = tdCol0.textContet || tdCol0.innerText;
			achadoValor0 = verificarCampoTable(cellValue, inputValue);
		}
		if(tdCol1){
			cellValue = tdCol1.textContent || tdCol1.innerText;
			achadoValor1 = verificarCampoTable(cellValue, inputValue);
		}
		if(tdCol2){
			cellValue = tdCol2.textContent || tdCol2.innerText;
			achadoValor2 = verificarCampoTable(cellValue, inputValue);
		}
		if(tdCol3){
			cellValue = tdCol3.textContet || tdCol3.innerText;
			achadoValor3 = verificarCampoTable(cellValue, inputValue);
		}
		if(tdCol4){
			cellValue = tdCol4.textContet || tdCol4.innerText;
			achadoValor4 = verificarCampoTable(cellValue, inputValue);
		}
		if(achadoValor0){
			tr[i].style.display = '';
		}else if(achadoValor1){
			tr[i].style.display = '';
		}else if(achadoValor2){
			tr[i].style.display = '';
		}else if(achadoValor3){
			tr[i].style.display = '';
		}else if(achadoValor4){
			tr[i].style.display = '';
		}else{
			tr[i].style.display = 'none';
		}
	}
}

function verificarCampoTable(cellValue, inputValue){
	return cellValue.toUpperCase().indexOf(inputValue) > -1; 
}






