<?php
/**
 * Header da página
 *
 * @package  CRUD-Agenda
 */

include_once 'includes.php';

if ( ! isset( $_SESSION ) ) session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="author" content="Leonardo Onofre">
	<meta name="description" content="CRUD simples, para uma aplicação de Agenda de Eventos, com cadastro de usuário e cadastro de Eventos"> 
	<meta name="keywords" content="Agenda, Eventos, CRUD, Agenda de Eventos">
	<meta name="robots" content="index, follow">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/styles/style.css">
	<title>Agenda</title>
</head>
<body>
	<nav class="navbar navbar-dark bg-dark">
		<div class="container">
			<a href="index.php" class="navbar-brand">Home</a>
			<ul class="nav justify-content-end">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Usuário</a>
						<div class="dropdown-menu navbar-dark bg-dark" aria-labelledby="navbarDropdown">
						<?php if ( ! isset( $_SESSION['id'] ) ) : ?>
							<a href="register.php" class="dropdown-item">Cadastro</a>
							<a href="login.php" class="dropdown-item">Login</a>
						<?php else : ?>
							<a href="user-profile.php" class="dropdown-item">Profile</a>
							<a href="event-page.php" class="dropdown-item">Novo Evento</a>
							<a href="user-login.php" class="dropdown-item">Logout</a>
						<?php endif; ?>
						</div>
				</li>
			</ul>
		</div>
	</nav>
<?php
