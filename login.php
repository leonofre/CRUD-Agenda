<?php
/**
 * Layout do formulário de cadastro.
 *
 * @package CRUD-Agenda
 */

/**
 * Require do arquivo header.php.
 */
require_once 'header.php';
?>
	<form class="container" id="login-form" method="POST" action="user-login.php">
		<h2 class="text-center">Login</h2>
		<div class="alert alert-success hidden" id="success-message" role="alert">
			Login concluído com sucesso!
		</div>
		<div class="alert alert-danger hidden" id="error-message" role="alert">
			Erro no Login!
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label" for="user_name">Nome</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="user_name" required="required">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label" for="user_email">Email</label>
			<div class="col-sm-10">
				<input type="email" class="form-control" name="user_email" required="required">
			</div>
		</div>
		<div class="form-group row">
			<button type="submit" class="btn btn-primary">Login</button>
		</div>
	</form>
<?php
require_once 'footer.php';
