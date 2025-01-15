<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>EVIF</title>
	<link rel="icon" type="image/x-icon" href="visao/img/logos/svg/favicon-EVIF-white.svg">

	<!-- Bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />

	<!-- CSS -->
	<link rel="stylesheet" href="visao/css/index.css"/>
	<link rel="stylesheet" href="visao/css/home.css"/>
	<link rel="stylesheet" href="visao/css/sobre.css"/>
	<link rel="stylesheet" href="visao/css/forms.css"/>
	<link rel="stylesheet" href="visao/css/adm.css"/>

	<!-- JS -->
	<!-- Bootrstrap JS -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"crossorigin="anonymous"></script>
	<!-- Icons -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
	<!-- jQuery -->
	<script src="visao/js/jquery-3.7.1.js"></script>
	<!-- Próprio -->
	<script src="visao/js/home.js"></script>
	<script src="visao/js/login.js"></script>
	<script src="visao/js/config.js"></script>
	<script src="visao/js/atividade.js"></script>

</head>
<body>
	<!--! CABEÇALHO -->
	<header>
		<div class="container">
			<nav class="row">

				<!-- Ferramentas -->
				<div class="col-sm div-navbar">

					<!-- Publicações -->
					<div class="nav-item">
						<a class="link-claro" href="index.php">
							<i><svg xmlns="http://www.w3.org/2000/svg" class="nav-svg bi bi-calendar-event-fill" fill="currentColor"
									viewBox="0 0 16 16">
									<path
										d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2m-3.5-7h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5" />
								</svg></i><br />
							Publicações
						</a>
					</div>

					<!-- Minhas Inscrições -->
					<div class="nav-item">
						<a class="link-claro" href="inscricao.php?fun=listUser">
							<i><svg xmlns="http://www.w3.org/2000/svg" class="nav-svg bi bi-clipboard-check-fill"
									fill="currentColor" viewBox="0 0 16 16">
									<path
										d="M6.5 0A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0zm3 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z" />
									<path
										d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1A2.5 2.5 0 0 1 9.5 5h-3A2.5 2.5 0 0 1 4 2.5zm6.854 7.354-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708.708" />
								</svg></i>
							<br />
							Minhas Inscrições
						</a>
					</div>

					<!-- Notificações -->
					<div class="nav-item">
						<a class="link-claro" href="#">
							<i><svg xmlns="http://www.w3.org/2000/svg" class="nav-svg bi bi-bell-fill" fill="currentColor"
									viewBox="0 0 16 16">
									<path
										d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2m.995-14.901a1 1 0 1 0-1.99 0A5 5 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901" />
								</svg></i>
							<br />
							Notificações
						</a>
					</div>
				</div>

				<!-- Logo -->
				<div class="col-sm div-logo">
					<a href="index.php"><img src="visao/img/logos/svg/logo-EVIF-white.svg" alt="logomarca" id="logoEVIF" /></a>
				</div>

				<!-- Meu perfil -->
				<div class="col-sm div-opcoes">
					<div class="nav-item">
						<a class="dropdown-toggle link-claro" href="#" role="button" data-bs-toggle="dropdown"
							aria-expanded="false">
							<i><svg xmlns="http://www.w3.org/2000/svg" class="nav-svg bi bi-person-circle" fill="currentColor"
									viewBox="0 0 16 16">
									<path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
									<path fill-rule="evenodd"
										d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
								</svg></i><br />
							Opções
						</a>

						<ul class="dropdown-menu">
							<?php 
							if(isset($_SESSION["usuario"]))
								echo "<li><a class='dropdown-item' href='usuario.php?fun=signout'>Sair da conta</a></li>";
							else
								echo "<li><a class='dropdown-item' href='usuario.php?fun=signin'>Entrar/Registrar</a></li>";
							?>
							<li><a class="dropdown-item" href="usuario.php?fun=config">Configurações</a></li>
							<!-- <li><a class="dropdown-item" href="solicitacao.php?fun=listUser">Solicitações</a></li> -->
							<li><a class="dropdown-item" href="index.php?fun=sobre">Sobre nós</a></li>
							<li><a class='dropdown-item' href='index.php?fun=prof'>Área do Professor</a></li>
							<li><a class='dropdown-item' href='index.php?fun=adm'>Área Administrativa</a></li>
						</ul>
					</div>
				</div>

			</nav>
		</div>
	</header>
  <div class="espaco-lg"></div>