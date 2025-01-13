<<<<<<< HEAD
<?php
session_start(); //Inicia a sessão
//área de memória dentro do servidor
//carrinho de compras, seus dados de conexão
//qualquer variável que vc queira criar
include_once("visao/cabecalho.php");
include_once("controle/protecao.php");

if(isset($_GET["fun"])){
	$fun = $_GET["fun"];
	
	if($fun == "sobre"){
		include_once("visao/paginas/sobre.html");

	} else if($fun == "prof"){
		proteger();
		include_once("visao/paginas/prof.html");

	} else if($fun == "adm"){
		proteger();
		include_once("visao/paginas/adm.html");

	} else {
		include_once("visao/paginas/erropage.html");		
	}
} else {
	include_once("visao/paginas/home.html");
}

//atribuição de responsabilidade
//o controle sabe como exibir a lista de veiculos
include_once("visao/rodape.php");
=======
<?php
session_start(); //Inicia a sessão
//área de memória dentro do servidor
//carrinho de compras, seus dados de conexão
//qualquer variável que vc queira criar
include_once("visao/cabecalho.php");
include_once("controle/protecao.php");

if(isset($_GET["fun"])){
	$fun = $_GET["fun"];
	
	if($fun == "sobre"){
		include_once("visao/paginas/sobre.html");

	} else if($fun == "prof"){
		protegerProf();
		include_once("visao/paginas/prof.html");

	} else if($fun == "adm"){
		protegerAdmin();
		include_once("visao/paginas/adm.html");

	} else {
		include_once("visao/paginas/erropage.html");		
	}
} else {
	include_once("visao/paginas/home.html");
}

//atribuição de responsabilidade
//o controle sabe como exibir a lista de veiculos
include_once("visao/rodape.php");
>>>>>>> master
