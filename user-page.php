<div class="alert alert-success hidden" id="success-message" role="alert">
	Operação concluída com sucesso!
</div>
<div class="alert alert-danger hidden" id="error-message" role="alert">
	Erro na operação!
</div>
<table class="table">
	<thead class="thead-dark">
		<tr>
			<th scope="col">Id</th>
			<th scope="col">Título</th>
			<th scope="col">Descrição</th>
			<th scope="col">Data</th>
			<th scope="col">Modificar</th>
		</tr>
	</thead>
	<tbody>
		<?php $events = $connect->get_element_by_column( $_SESSION['id'], 'user_id', 'event' ); ?>
		<?php if ( is_array( $events ) ) : ?>
			<?php foreach ( $events as $event ) : ?>
				<form class="change-event">
					<tr>
						<th scope="row">
							<?php echo $event->get_id(); ?>
							<input type="hidden" name="id" value="<?php echo $event->get_id(); ?>">
						</th>
						<td><input type="text" name="title" value="<?php echo $event->get_title(); ?>"></td>
						<td><textarea name="description" cols="30" rows="1"><?php echo $event->get_description(); ?></textarea></td>
						<td><input type="text" name="date" value="<?php echo date( 'd/m/Y', strtotime( $event->get_date() ) ); ?>"></td>
						<td>
							<button class="operation" value="update">Alterar</button>
							<button class="operation" value="delete">Deletar</button>
							<input type="hidden" class="operation" name="operation" value="">
						</td>
					</tr>
				</form>
			<?php endforeach; ?>
	<?php endif; ?>
	</tbody>
</table>