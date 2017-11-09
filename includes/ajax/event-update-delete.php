<?php
/**
 * Função de tratamento do AJAX de atualização de Evento
 *
 * @package CRUD-Agenda
 */

include_once '../../includes.php';
if ( ! isset( $_SESSION ) ) session_start();

if ( $_SESSION['id'] && $_POST['id'] ) {
	switch ( $_POST['operation'] ) {
		case 'update':
			$event  = new Event( $_SESSION['id'], $_POST['description'], $_POST['title'], $_POST['date'], $_POST['id'] );
			$result = $connect->update_element( $event, 'event' );
			break;
		case 'delete':
			$result = $connect->delete_element( $_POST['id'], 'event' );
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

if ( $is_update ) {
	echo json_encode( $args );
} else {
	include_once '../../user-page.php';
}
