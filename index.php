<?php 
		include("principal/conexiones_carrito.php");


 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Carrito</title>
	<meta charset="utf-8">
	<meta name="description" content="Es una practica de carrito de compras basada en php puro, sin javaScript">
	<meta name="keywords" content="carrito, compras, pedido">
	<meta name="robot" content="index">
	<meta http-equiv="cache-control" content="no-control">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@1,700&family=Playfair+Display&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&display=swap" rel="stylesheet">

	<script src="https://kit.fontawesome.com/845f067532.js" crossorigin="anonymous"></script>

	

	<style type="text/css">

	@media(max-width: 2000px){	


		*{
			padding: 0px;
			margin: 0px;
		}
		body{
			position: relative;
		}
		header{
			display: flex;
			position: sticky;
			top: 0px;

			justify-content: space-around;
			align-items: center;
			padding: 10px 0px;
			background-color: white;

			box-shadow: 1px 1px 1px 1px #bbb;
			z-index: 2000;
		}
		header h1{
			font-size: 1.6rem;
			color: #555;

			font-family: 'Cormorant Garamond', serif;
		}
		header i{
			font-size: 1.3rem;
		}

		a{

			padding: 5px;
			text-decoration: none;
			color: grey;

		}
		#menu{
			font-size: 1.3rem;
		}

/*---------------------------------------------- MENSAJES DEVUELTOS -------------------------*/

		.conf{

			color: white;
			text-align: center;
			background-color: #222;
			
			padding: 5px 0px;

		}

		.sessionMessage{

			display: flex;
			justify-content: center;
		

			align-items: center;
			padding: 20px 0px;


		}

		.sessionMessage > p{
			font-family: 'Cormorant Garamond', serif;
			font-size: 1.5rem;
		}

		.sessionMessage > p{

			font-size: 1.5rem;
			color: #444;
		}

		.sessionMessage > i{
			font-size: 1.5rem;
		}


		.sessionMessage a{
			font-size: 1.5rem;
			color: #557;
		}

/*--------------------------------- NAVEGACION -------------------*/

		nav{

				animation: none;
				display: none;
				padding: 10px;
				position: fixed;
				width: 250px;
				height: 100%;

				background-color: white;

				z-index: 1000;
				box-shadow: 1px 2px 1px 1px #bbb;

				border-top: solid 1px #bbb; 

			}
			nav > div{
				padding-bottom: 10px;
			}
			nav > div > p{
				font-weight: bolder;
				font-size: 1rem;
				padding: 10px 0px 0px 0px;
			}
			nav > ul{
				width: 100%;
				flex-direction: column;
				justify-content: flex-start;
				align-items: flex-start;

			}
			#categorias_iniciar_sesion{
				display: none;
			}
			li{
				list-style-type: none;
				background-color: unset;
				width: 200px;

				padding: 5px;
				border:none;
				border-radius: 0px;
				border-bottom: solid 1px #999; 

				margin: 0px 0px 0px 10px;

				text-align: left;
			}

			li a{

				color: #444;
			}

			li:hover{
				background-color: white;
				border:none;
				border-bottom: solid 1px #000;
				
			}
			li:hover a{

				color: #333;

			}



/*------------------------------------------- BUSCADOR ------------------------*/

		#buscador{
			position: relative;
			padding: 10px 0px;

		}

		#buscador > div:nth-child(1){

			display: flex;
			justify-content: center;
			align-items: center;


		}

		#buscador > div:nth-child(1) > span > input{

			width: 300px;
			padding: 5px;

		}
		#buscador > div:nth-child(1) > span > button{

			width: 100px;
			padding: 5px;


			color: white;
			border:solid 1px #555;
			background-color: #333;


		}

		#buscador  span{

			margin: 0px 10px;
			
		}

		#buscador  span > *{
		padding: 5px;

		}

		#caja_resultado_buscar{
			display: none;
			overflow-y: auto;
			position: fixed;
			left: 25%;
			top: 25%;
			width: 50%;

			
			background-color: white;

			border: solid 1px #aaa;

			padding: 10px 0px 20px 0px;


			z-index: 2002;


		}
		#caja_resultado_buscar > #cerrar_resultado_buscar{

			padding: 0px 0px;

		}

		#caja_resultado_buscar > #cerrar_resultado_buscar > span{

			color: #555;
		}

		#caja_resultado_buscar > #div_cargando{
			
			display: flex;
			justify-content: center;

		}


		#caja_resultado_buscar > div > #cargando{

			width: 30px;
			height: 30px;
			border: solid 5px #aaa;
			border-top-color: #55d;
			border-radius: 50%;

			animation: spiner .7s linear 0s infinite;


		}
		@keyframes spiner{
			0%{
				transform: rotate(0deg);
			}
			100%{
				transform: rotate(360deg);
			}
		}



		#caja_resultado_buscar > #resultado_buscar{

			display: flex;
			justify-content: center;
			flex-wrap: wrap;
			padding: 15px 0px 0px 0px;


		}


		#caja_resultado_buscar > #resultado_buscar  > .result{
			/*text-align: center;
			padding: 5px;
			margin: 0px 5px;
			color: white;
			background-color: #75f;

			border-radius: 5px;
			box-shadow: 1px 1px 1px 1px #aaa;*/


		}

		#caja_resultado_buscar > #resultado_buscar  > .result{
			
			padding: 5px;
			margin: 5px;
			border: solid 1px #ccc;
			border-radius: 3px;

		}

		#caja_resultado_buscar > #resultado_buscar  > .result > a{
				font-size: 1.1rem;
				color: #777;
				font-weight: bold;

		}

		#caja_resultado_buscar > #resultado_buscar  > #sinResult{
				
				display: flex;
				justify-content: center;
				align-items: center;

		}

		#caja_resultado_buscar > #resultado_buscar  > #sinResult > p{
				
			color: #F82007;
			text-align: center;
			font-size: 1.5rem;

		}


		

/*----------------------------------- PRODUCTOS -----------------------*/


		#product{

			width: 100%;
			display: flex;
			justify-content: center;
			flex-wrap: wrap;
			opacity: 1;

			padding: 20px 0px;

			animation: carga  .5s linear 0s 1;

		}
		@keyframes carga{

			0%{
				padding-top: 100px;
				opacity: 0;
			}
			50%{
				padding-top: 50px;
				opacity: 0.5;
			}

		}

		.products{
			width: 200px;
			height: 250px;
		
			padding: 5px 0px;
			border: solid 1px #ddd;
			margin: 5px;
			background-color: white;

		}
		.products:hover{

			border: solid 1px #555;

		}

		.products > p , .vpu_products > p{

			text-align: center;

		}
		.products > div , .vpu_products > div{

			width: 100%;
			padding: 5px 0px;

		}
		.products > div:nth-child(1){
			display: flex;
			justify-content: space-around;
			align-items: center;
			flex-direction: column;
		}
		.products > div:nth-child(1) > p:nth-child(1){
			width: 100%;
			text-align: right;
			padding-bottom: 5px;
		}
		.products > div:nth-child(1) > p:nth-child(1) > span{
			background-color: #6aa;
			padding: 3px;
			color: white;	
			font-size: 0.9rem;
		}

		.products > div:nth-child(1) > p:nth-child(2){
			
			color: #444;
			padding: 3px;
			border-radius: 5px;
			font-size: 0.9rem;
			font-weight: bold;
			font-family: 'Playfair Display', serif;
		}

		.products > div  img{
			width: 190px;
			height: 150px;

		}
		.products > .div_opciones{

		}
		.products button {
			width: 95%;
			padding: 5px 0px;
			border:solid 1px #588;
			background-color: #577;
			color: white;


		}






		.vpu_products{
			display: flex;
			flex-direction: column;

			width: 500px;
			padding: 0px 0px 25px 0px;
		}
		.vpu_products > .precio{
			text-align: right;
			padding: 15px 10px;
			font-size: 1.1rem;
			color: #598;

		}

		.vpu_products > *{
			padding: 5px 0px;
		}

		.vpu_products > div {
			text-align: center;

		}

		.vpu_products > div:nth-child(2) {
			display: flex;
			justify-content: center;
			align-items: center;
				padding-bottom: 15px;
		}

		.vpu_products > div:nth-child(2) > * {
			margin: 0px 10px;
		}

		.vpu_products > div:nth-child(2) > p{
			
			font-size: 1.1rem;
			font-weight: normal;
			font-family: 'Playfair Display', serif;

		}


		.vpu_products > div:nth-child(2) > .fa-heart:hover{
			color: #c55;
		}

		.vpu_products > div > img  {
			width: 300px;
			height: 250px;



		}

		.vpu_products .descripcion, .vpu_products .vendedor {
			font-size: 0.9rem;
			font-family: 'Libre Baskerville', serif;
			text-align: left;
			padding: 10px ;
			color: #333;
			border-bottom: solid 1px #ccc;
		}
		.vpu_products .descripcion {
			color: #557;
		}

		.vpu_products button {
			width: 100%;
			padding: 5px 0px;
			border:solid 1px #588;
			background-color: #577;
			color: white;

			font-size: 1.2rem;

		}


		.danger{
			background-color: #a55;
			padding: 10px;
			color: #9dd;
		}




		.products_carrito{

			width: 400px;
			display: flex;
			align-items: center;
			padding: 10px;
			border-bottom: solid 1px #aaa;
			margin: 10px;

		}
		.products_carrito > div{

			flex: 1;
			background-color: unset;

		}
		.products_carrito > div:nth-child(1) > img{
			width: 200px;
			height: 150px;


		}
		.products_carrito > div:nth-child(1) > p{
			text-align: center;
			padding: 5px 0px 15px 0px;
			font-size: 0.95rem;


			font-family: 'Playfair Display', serif;
		}
		.products_carrito > div:nth-child(2) > p{
			text-align: center;
			padding: 5px 0px;
			color: #444;

		}
		.products_carrito > div:nth-child(2) button{
			padding: 5px;
			width: 100px;
			background-color: white;
			color: #955;
			font-weight: bold;
			border:solid 1px #744;

		}
		.products_carrito > div:nth-child(2) button:hover{

			background-color: #955;
			color: white;


		}
		#tramite{
			display: flex;
			justify-content: center;
			padding-bottom: 15px;
		}

		#tramite  a{
			font-size: 1.5rem;
			padding: 5px;
			background-color: white;
			color: #447;
			border: solid 1px white;
		}
		#tramite_fallido{
			padding: 10px;
			box-sizing: border-box;
		}
		#tramite_fallido > p{
			text-align: center;
		}
		#tramite_fallido > h3{
			font-size: 1.1rem;
			font-family: 'Playfair Display', serif;
		}
		#tramite_fallido > h3 > a{
			color: #557;
		}




		.counters{

			padding: 5px 0px;

		}
		.counters > span{

			padding: 5px;
			font-size: 1rem;

		}
		.counters > span:nth-child(1){

			background-color: #55b;
			color: white;

			border:solid 1px #55b;
		}
		.counters > span:nth-child(2){

			background-color: #b55;
			color: white;
			border:solid 1px #b55;

		}

		.counters > span:nth-child(1):hover{

			background-color: white;
			color: #55b;
		}

		.counters > span:nth-child(2):hover{

			background-color: white;
			color: #b55;

		}





		#ventana_oscura{
			display: none;
			position: fixed;
			top: 0px;
			left: 0px;
			width: 100%;
			height: 100%;
			background-color: rgba(0, 0, 0, 0.5);
			z-index: 2001;
		}

			







	}


	

		@media(max-width: 768px){


			.sessionMessage{

				flex-direction: column;
				
				padding: 20px 0px;


			}

			.sessionMessage > p{
				font-size: 1.4rem;
			}
			.sessionMessage a{
				font-size: 1.3rem;
			}
			
			header h1{
				font-size: 1.3rem;
			}

			header i{
				font-size: 1.1rem;
			}


			#caja_resultado_buscar{
				
				left: 10%;
				top: 20%;
				width: 80%;

			}
			#caja_resultado_buscar > #resultado_buscar  > #sinResult > p{
				
				font-size: 1.3rem;

			}
			#caja_resultado_buscar > #resultado_buscar  > .result > a{
				
				font-size: 1rem;

			}

			.products{

				width: 170px;
				height: 230px;

			}

			.products > div  img{
				width: 160px;
				height: 130px;


			}


			.vpu_products{

				width: 400px;

			}

			.vpu_products > div > img  {
				width: 250px;
				height: 200px;

			}

			.vpu_products button {
				font-size: 1rem;

			}

			#tramite  a{
				font-size: 1.3rem;
			}








		}
		
		@media(max-width: 500px){



			header h1{
				font-size: 1.2rem;
			}

			header i{
				font-size: 0.9rem;
			}

			#menu{
				font-size: 1.1rem;
			}
			#caja_resultado_buscar{
			
				
				left: 0%;
				width: 100%;

			}
			#caja_resultado_buscar > #resultado_buscar  > #sinResult > p{
				
				font-size: 1.1rem;

			}

			#caja_resultado_buscar > #resultado_buscar  > .result > a{
				
				font-size: 0.9rem;

			}



			#categorias_iniciar_sesion{
				display: block;
			}

			#categorias_iniciar_sesion .sessionMessage > p, #categorias_iniciar_sesion .sessionMessage  a, #categorias_iniciar_sesion .sessionMessage  i{
				font-size: 1rem;
			}


			.sessionMessage > p{
				font-size: 1.2rem;
			}




			.nombre{
				font-size: 0.5rem;
			}


			.vpu_products{

				width: 300px;

			}
			.vpu_products .descripcion{
				font-size: 0.9rem;
			}


			.vpu_products > div > img  {
				width: 200px;
				height: 150px;

			}

			.vpu_products button {
				width: 250px;
				font-size: 0.9rem;

			}





			#tramite  h3{
				font-size: 0.85rem;
			}



			.products_carrito{

				width: 300px;
				margin-bottom: 10px;

			}

			.products_carrito > div:nth-child(1) > img{
				width: 180px;
				height: 130px;


			}

			.products_carrito > div:nth-child(1) > p{
				font-size: 0.85rem;
			}
			.products_carrito > div:nth-child(2) > p{
				font-size: 0.9rem;
			}



	/*------------------------------------------- BUSCADOR ------------------------*/


			#buscador > div:nth-child(1) > span > input{

				width: 230px;

			}
			#buscador > div:nth-child(1) > span > button{

				width: 80px;

			}

			#tramite_fallido > h3{
				font-size: 1rem;
			}



		}

		@media(max-width: 420px){

			header i{
				font-size: 1.1rem;
			}
			.vpu_products, .products_carrito{

				width: 100%;
				margin-bottom: 10px;

			}




			.vpu_products .nombre{
				font-size: 1.2rem;
			}

			.vpu_products{

				width: 100%;

			}


			.vpu_products button{

				padding: 5px 0px;

			}

			#tramite  a{
				font-size: 1.2rem;
			}






			#buscador > div:nth-child(1) > span > input{

				width: 200px;

			}
			#buscador > div:nth-child(1) > span > button{

				width: 50px;

			}
			



		}
		
		



	</style>


	<script type="text/javascript">
		/*--------------------------------------------------------------- CLASES ---------------------------*/

		class callDocument{

			makeRequest(url, data, callback){

				return fetch(url, {
			 		method : "POST",
			 		body : data
		 		})
		 		.then(resProcess => resProcess.json())
		 		.then(callback);
 		
			}

		}

		class cookie{

			getCookie(nameCookie = "ID_PRODUCTO"){

				return document.cookie.split(";").reduce((acu, el)=>{

					if(el.includes(nameCookie)){
	
						acu = el;

					}
					return acu;

				}, '').split("=")[1];


			}

		}

		class CookieProducts extends cookie{

			setCookieProductsReduce(index = 0, action = '', nameCookie = "ID_PRODUCTO"){
				this.index = index;
				this.action = action;

				let cookieProducts = JSON.parse(decodeURIComponent(this.getCookie(nameCookie)));

				this.cookieProductsUpdated = cookieProducts.reduce((acu, el) => this.action != "t"?this.createNewCookieProducts(acu, el):this.getCountProducts(acu, el)
				,[]);

			}

			createNewCookieProducts(acu = [], el){//private

					if(el.ID == this.index){el.CANTIDAD = eval(el.CANTIDAD +this.action+ 1);}
					
					return acu.concat(el);

			}

			getCountProducts = (acu = 0, el) => parseInt(acu + el.CANTIDAD)//private
		}

		class processCookie{

			getDateToNewCookie(){

				let dateActual = new Date();
				return new Date(`${dateActual.getFullYear()}, ${(dateActual.getMonth() + 2)}, ${dateActual.getDate()}`);
			}

			setCookieUpdated(cookieProductsUpdated, nameCookie = "ID_PRODUCTO"){
				
					document.cookie = `${nameCookie}=${JSON.stringify(cookieProductsUpdated)}; expires=${this.getDateToNewCookie().toString()};`;

			}

			deleteCookie(nameCookie = "ID_PRODUCTO"){

					document.cookie = `${nameCookie}=''; expires=Sun Jul 11 2020 00:00:00 GMT+0200;`;
			}

		}

		class updateDocument{

			constructor(index, action, cookieProductsUpdated, objeto){
				//console.log("updateDocument");
				this.index = index;
				this.action = action;
				this.cookieProductsUpdated = cookieProductsUpdated;
				this.objeto = objeto;

				this.setDataToChange();

			}

			setDataToChange(){

				this.idObjectToChangeIcon = this.getIdProdcut() + "-2";
				this.objectToChange = document.getElementById(this.idObjectToChangeIcon);

				this.newAmount = this.getNewAmount();
				this.newPrice =  this.getNewPrice();

				this.makeChangeInDocument();
			}

			makeChangeInDocument(){

				this.newAmount == 1 ? this.makeChangeToDelete() : this.makeChangeToSubstrac();

				$("#span_counter").text(this.cookieProductsUpdated);
				$(`#${this.index}c`).text(this.newAmount);
				$("#buy").text(this.newPrice);

			}

			makeChangeToDelete (){

				this.objectToChange.className = "fas fa-trash";
				this.objectToChange.onclick = () => location.assign("index.php?EP&ID=" + this.getIdProdcut(this.objectToChange))
				
			}

			makeChangeToSubstrac(){

				this.objectToChange.className = "fas fa-chevron-down";
				this.objectToChange.onclick = objeto => updateCookie(this.getIdProdcut(this.objectToChange) , "-" , objeto.target);
		
			}

			getIdProdcut = () => this.objeto.id.split("-")[0]
			getNewAmount = () => eval(parseInt($(`#${this.index}c`).text()) +this.action+ 1)
			getNewPrice = () => eval(parseInt($(`#buy`).text()) +this.action+ parseInt($(`#${this.index}p`).text()))
			
		}

		class createOrUpdateFavoriteList{

			createFavoriteList(id){

				this.favoriteList = [{
					id:id
				}];

			}

			updateFavoriteList(id, cookieFavoriteList){

				this.newProductTOInsert = {
					id:id
				};

				this.favoriteList = cookieFavoriteList;

				this.favoriteList.push(this.newProductTOInsert);
			}

			getFavoriteList = () => this.favoriteList;
			
		}

		class removeFromFavoriteList{

			removeProductFromFavoriteList(id, cookieFavoriteList){

				this.cookieFavoriteListUpdate = cookieFavoriteList.reduce( (acu, el) => {
					if(id != el.id){

						acu = [...acu, el];
					}
					return acu;

				} , []);


			}

			getFavoriteList = () => this.cookieFavoriteListUpdate;

		}

		/*------------------------------------------------- FIN CLASES ------------------------------*/

		


		StartApp = () => {

			let ButtonSearch = document.getElementById("buscar");

			$(".div_opciones").hide();

			ButtonSearch.addEventListener("click", () => {
				$("#div_cargando").fadeIn(0);
				$("#ventana_oscura").fadeIn(0);
				seachBox = document.getElementById("caja_buscar").value;
				seachBox != ""?defineArgement(seachBox):alert("Inserte Algo");

			});


			$("#menu").click( objeto => $("#categorias")["0"].style.display != "block" ? lookMenu(objeto) : hideMenu(objeto));

			$(".products").mouseenter( obj =>{

				let objeto = obj.currentTarget.children["2"];

				$(objeto).fadeIn(150);
				$(obj.currentTarget).mouseleave(() => $(objeto).fadeOut(150) );

			});

			$(".fa-heart").mouseenter(objeto => objeto.target.className = "far fa-heart");
			$(".fa-heart").mouseleave(objeto => objeto.target.className = "fas fa-heart");



		}

		lookMenu = objeto =>{

			$("#categorias").show(150);
			objeto.target.className = "fas fa-times";
		
		}
		hideMenu = objeto =>{
			
			$("#categorias").hide(150);
			objeto.target.className = "fas fa-align-left";
		
		}

		defineArgement = valu => {

			let objeto = document.getElementById("buscar").querySelector("i");
			objeto.className = "fas fa-exclamation";
			objeto.style.color = "#faa";


			let dataSearch = new FormData();
			dataSearch.append("valueTittle", valu);

			let createRequest = new callDocument();
			createRequest.makeRequest("gestiones/buscador.php", dataSearch, printResult);

			lookWindow(objeto);

		}
		lookWindow = objeto =>{

			let box = document.getElementById("caja_resultado_buscar");

			$(box).fadeIn(100);

			$("#cerrar_resultado_buscar > span").click( function(){

				$("#ventana_oscura").fadeOut(0);
				$(box).fadeOut(100);
				objeto.className = "";
				objeto.style.color = "white";

			});

			$("#div_cargando").fadeOut(100);


		}


	
		printResult = res => {//funcion que la pasamos como callback

			let contain = "<div id='sinResult'> <p> <i class='fas fa-exclamation-circle'></i> Sin Resultados</p></div>";

			if(res.length > 0){

				let objeto = document.getElementById("buscar").querySelector("i");
				objeto.className = "fas fa-check";
				objeto.style.color = "#afa";


				contain = res.reduce((acu, el) =>{

					return acu +=  `<div class='result'>
						<a href='index.php?VPU=${el["ID"]}'> ${el["NOMBRE"]} </a>
					</div>`;

				} , "");
				
			}

			document.getElementById("resultado_buscar").innerHTML = contain;
		}


			
		updateCookie = (index, action, objeto) =>{

			console.time();

			let cookieProducts = new CookieProducts();
			let updateCookie = new processCookie();

			cookieProducts.setCookieProductsReduce(index, action);
			updateCookie.setCookieUpdated(cookieProducts.cookieProductsUpdated);

			cookieProducts.setCookieProductsReduce(0, "t");

			let updateDoc = new updateDocument(index, action, cookieProducts.cookieProductsUpdated, objeto);

			console.timeEnd();


		}

		addProductToFavoriteList = (objeto, id) =>{

			console.time();

			let accessCookie = new cookie();
			let processFavoriteList = new createOrUpdateFavoriteList(id);
			let processCookieFavoriteList = new processCookie();

			let LISTA_DESEO = accessCookie.getCookie("LISTA_DESEO");
			
			LISTA_DESEO ? processFavoriteList.updateFavoriteList(id, JSON.parse(LISTA_DESEO)) : processFavoriteList.createFavoriteList(id);

			processCookieFavoriteList.setCookieUpdated(processFavoriteList.getFavoriteList(), "LISTA_DESEO");

			objeto.style.color = "#d55";
			objeto.onclick = () => removeProductFromCookie(objeto, id)

			console.timeEnd();

		}

		removeProductFromCookie = (objeto, id) =>{

			console.time();

			let accessCookie = new cookie();
			let processFavoriteList = new removeFromFavoriteList();
			let processCookieFavoriteList = new processCookie();
			LISTA_DESEO = JSON.parse(accessCookie.getCookie("LISTA_DESEO"));

			processFavoriteList.removeProductFromFavoriteList(id, LISTA_DESEO);

			const newFavoriteList = processFavoriteList.getFavoriteList();

			newFavoriteList.length > 0 ? processCookieFavoriteList.setCookieUpdated(newFavoriteList, "LISTA_DESEO") : processCookieFavoriteList.deleteCookie("LISTA_DESEO");


			objeto.style.color = "#ccc";		
			objeto.onclick = () => addProductToFavoriteList(objeto, id)

			console.timeEnd();
		}



	window.addEventListener("load", StartApp);
	

	
	</script>

</head>
<body>
	<header>
		<?php 
			if(!$_SESSION['carUser'] && isset($_SESSION['fromAgg'])){

			echo "<div><i onclick='history.back();' style='color:#599;' class='fas fa-arrow-alt-circle-left'></i></div>";

			}

		 ?>
		<div id="menu">
			<span class="fas fa-align-left" ></span>
		</div>
		<div>
			<h1>STORE</h1>
		</div>
		<div>
			<a href="index.php?carrito">
				<span id="span_counter">
					<?php 
						$cantidad_productos = 0;
							
						if(isset($_COOKIE["ID_PRODUCTO"])) {

							$cantid = json_decode($_COOKIE["ID_PRODUCTO"]);

							for($i = 0; $i < count($cantid); $i++){

								$cantidad_productos += $cantid[$i]->CANTIDAD;


							}
						}
						echo $cantidad_productos;

					 ?>	
				</span>
				<i style="color: #000;" class="fas fa-shopping-cart"></i>
			</a>
		</div>

		<?php 

			if($_SESSION["carUser"]){

				echo '<div>
					<a href="gestiones/cerrar_sesion.php" class="fas fa-external-link-alt"> Cerrar Sesi&oacuten </a>
				</div>';

			}

		 ?>
	</header>

	<nav id="categorias">
		<div>
			<p>Men&uacute</p>
		</div>
		<ul>	
			<li><a href="index.php" class=""> Inicio</a></li>
			<li><a href="index.php?LD" class=""> Lista de deseos</a></li>
		</ul>
		<div>
			<p>Categor&iacuteas</p>
		</div>

		<ul>
			<?php 

				echo $categorias_nav;

			 ?>
		</ul>
		<div id="categorias_iniciar_sesion">
			<?php
	 		if(isset($userSession)){

				echo $userSession;

	 		}
	 		?>
		</div>
		
	</nav>


	<?php 

	 		if(isset($_GET["conf"])){

				echo "<p class='conf' id='conf'>" . $_GET["conf"] . "</p>";

	 		}

	 		if(isset($userSession)){

				echo $userSession;

	 		}

	 ?>

	 <div id="buscador">

		<div>
				
			<span>
				<input type="text" name="caja_buscar" id="caja_buscar" placeholder="buscar">
			</span>

			<span>
				<button id="buscar" class="fas fa-search"> <i class=""></i> </button>
			</span>
		</div>

		<div id="caja_resultado_buscar">

			<div id="cerrar_resultado_buscar">

				<span class="fas fa-close"></span>
			</div>

			<div id="div_cargando">

				<span id="cargando"></span>
				
			</div>

			<div id="resultado_buscar">

				
			</div>

		</div>

		
	</div>

	 <div id="product">

	 	<?php 

	 		if(isset($contenido)){

				echo $contenido;

	 		}

	 	 ?>

	 </div>
	 <?php 

	 		if(isset($tramite)){

				echo $tramite;
	 		}


	  ?>

<!--
	  <div>
	  	<ul>
	  		<li class="li_nav">inicio</li>
	  		<li class="li_nav">ayuda</li>
	  		<li class="li_nav">contacto</li>
	  	</ul>
	  </div>

	  <script type="text/javascript">
	  	
	  	let lis = document.getElementsByClassName("li_nav");

	  	for(i = 0; i < lis.length; i++){

	  		lis[i].addEventListener("mouseenter", objeto =>{

	  			objeto.target.style.color = "red";

	  		});

	  		lis[i].addEventListener("mouseleave", objeto =>{

	  			objeto.target.style.color = "black";

	  		});

	  	}

	  </script>
-->


<div id="ventana_oscura"> </div>
</body>
</html>
