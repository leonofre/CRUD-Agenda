<?php
/**
 * Layout do formulário de edição do perfil.
 *
 * @package CRUD-Agenda
 */

/**
 * Require do arquivo header.php.
 */
require_once 'header.php';
$user = $connect->get_element_by_column( $_SESSION['id'], 'id', 'user' );
?>
	<form class="container" id="update-user-form">
		<h2 class="text-center">Login</h2>
		<div class="alert alert-success hidden" id="success-message" role="alert">
			Atualização concluída com sucesso!
		</div>
		<div class="alert alert-danger hidden" id="error-message" role="alert">
			Erro na atualização!
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label" for="user_name">Nome</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="user_name" required="required" value="<?php echo $user->get_name(); ?>">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label" for="user_email">Email</label>
			<div class="col-sm-10">
				<input type="email" class="form-control" name="user_email" required="required" value="<?php echo $user->get_email(); ?>">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label" for="user_phone">Telefone</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="user_phone" required="required" value="<?php
				echo $user->get_phone(); ?>">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-form-label" for="user_description">Descrição</label>
			<div class="col-sm-10">
				<textarea class="form-control" name="user_description" required="required"><?php echo $user->get_description(); ?></textarea>
			</div>
		</div>
		<div class="form-group row">
			<input type="hidden" name="id" value="<?php echo $user->get_id(); ?>">
			<input type="hidden" name="operation" value="update">
			<button type="submit" class="btn btn-primary">Editar</button>
		</div>
	</form>
	<form class="container" id="delete-user-form" method="POST" action="includes/ajax/user-update-delete.php">
		<div class="form-group row">
			<input type="hidden" name="id" value="<?php echo $user->get_id(); ?>">
			<input type="hidden" name="operation" value="delete">
			<button type="submit" class="btn btn-danger" id="delete-user">Deletar</button>
		</div>
	</form>
<?php
require_once 'footer.php';
