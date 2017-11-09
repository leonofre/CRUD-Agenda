<?php
/**
 * Layout do formulário de cadastro de Evento.
 *
 * @package CRUD-Agenda
 */

/**
 * Require do arquivo header.php.
 */
require_once 'header.php';
?>
	<form class="container" id="register-event-form">
		<h2 class="text-center">Cadastro</h2>
		<div class="alert alert-success hidden" id="success-message" role="alert">
			Cadastro concluído com sucesso!
		</div>
		<div class="alert alert-danger hidden" id="error-message" role="alert">
			Erro ao cadastrar!
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label" for="event_title">Título</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="event_title" required="required">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label" for="event_description">Descrição</label>
			<div class="col-sm-10">
				<textarea class="form-control" name="event_description" required="required"></textarea>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label" for="event_date">Data</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="event_date" required="required" placeholder="DD-MM-YYYY">
			</div>
		</div>
		<div class="form-group row">
			<button type="submit" class="btn btn-primary">Cadastrar</button>
		</div>
	</form>
<?php
require_once 'footer.php';
