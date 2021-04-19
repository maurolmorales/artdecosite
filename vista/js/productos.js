let sinStock = ()=>{
	var i; var placa = document.querySelectorAll('.sinStock');
	for(i = 0; i < placa.length; i++){
		var banner = document.createElement('img');
		banner.setAttribute('src', 'img/agotado.png');
		banner.className = 'cartelAgotado';
		placa[i].appendChild(banner);
	}
};
sinStock();
