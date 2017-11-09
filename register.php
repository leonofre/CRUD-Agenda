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
	<form class="container" id="register-form">
		<h2 class="text-center">Cadastro</h2>
		<div class="alert alert-success hidden" id="success-message" role="alert">
			Cadastro concluído com sucesso!
		</div>
		<div class="alert alert-danger hidden" id="error-message" role="alert">
			Erro ao cadastrar!
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
			<label class="col-sm-2 col-form-label" for="user_phone">Telefone</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="user_phone" required="required">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label" for="user_description">Descrição</label>
			<div class="col-sm-10">
				<textarea class="form-control" name="user_description" required="required"></textarea>
			</div>
		</div>
		<div class="form-group row">
			<button type="submit" class="btn btn-primary">Cadastrar</button>
		</div>
	</form>
<?php
require_once 'footer.php';
