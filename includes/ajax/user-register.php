<?php
/**
 * Função de tratamento do AJAX de cadastro de Usuário
 *
 * @package CRUD-Agenda
 */

include_once '../../includes.php';

if ( $_POST['user_name'] && $_POST['user_email'] && $_POST['user_phone'] && $_POST['user_description'] ) {
	$user    = new User( $_POST['user_name'], $_POST['user_email'], $_POST['user_phone'], $_POST['user_description'] );
	$result = $connect->set_element( $user, 'user' );

	if ( 'Success' === $result ) {
		$args = array(
			'success' => true,
			'status'  => 200,
			'message' => $result,
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
