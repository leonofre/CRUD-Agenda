<?php
/**
 * Função de tratamento do AJAX de atualização de Usuário.
 *
 * @package CRUD-Agenda
 */

include_once '../../includes.php';
if ( ! isset( $_SESSION ) ) session_start();

if ( $_POST['id'] ) {
	switch ( $_POST['operation'] ) {
		case 'update':
			$user = new User( $_POST['user_name'], $_POST['user_email'], $_POST['user_phone'], $_POST['user_description'], $_POST['id'] );
			$result = $connect->update_element( $user, 'user' );
			break;
		case 'delete':
			$result = $connect->delete_element( $_POST['id'], 'user' );
			break;
		default:
			$result = false;
			break;
	}

	$is_update = 'update' === $_POST['operation'] ? true : false;

	if ( 'Success' === $result ) {
		$args = array(
			'success'   => true,
			'status'    => 200,
			'message'   => $result,
		);
	} else {
		$args = array(
			'success' => false,
			'status'  => 200,
			'message' => $result,
		);
	}
} else {
	$args = array(
		'status' => 500,
	);
}

echo json_encode( $args );
